<?php
include 'config.php';
session_start();

// Assuming $connection is your database connection object

// Validate and sanitize the mobile number
if (isset($_POST['login'])) {
  $mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($connection, $_POST['mobile']) : '';

  if (!empty($mobile)) {
    $checkQuery = "SELECT `id`, `mobile` FROM `users` WHERE mobile = '$mobile'";
    $result = $connection->query($checkQuery);

    if ($result->num_rows > 0) {
      // Fetch user data
      $userData = $result->fetch_assoc();

      // Start a session
      $_SESSION['user_id'] = $userData['id'];
      $_SESSION['mobile'] = $userData['mobile'];

      // Redirect to a logged-in user page or perform other actions
      header("Location: dashboard.php");
      exit();
    } else {
      $otp = rand(100000, 999999);
      $insertQuery = "INSERT INTO `users`(`mobile`, `otp`, `status`) VALUES ('$mobile','$otp','Unverify')";
      $user = $connection->query($insertQuery);
      if ($user) {
        header("Location: index.php?status=" . urlencode($mobile));
        exit();
      }
    }
  } else {
    echo "Something is wrong.";
  }
}

// otp verify

if (isset($_POST['otpBtn'])) {
  // Validate and sanitize the input
  $mobile = validateAndSanitize($_POST['mobile']);
  $otp = validateAndSanitize($_POST['otp']);

  // Check if the provided OTP is correct
  $checkQuery = "SELECT * FROM `users` WHERE mobile = '$mobile' AND otp = '$otp'";
  // Assuming you have a database connection stored in $connection
  $result = $connection->query($checkQuery);

  if ($result && $result->num_rows > 0) {
      // OTP is correct, update status in the users table
      $updateQuery = "UPDATE `users` SET status = 'Verified' WHERE mobile = '$mobile'";
      $connection->query($updateQuery);

      // Set session variable for login
      $_SESSION['user_mobile'] = $mobile;

      // Redirect to the dashboard or any other page after successful login
      header("Location: dashboard.php");
      exit();
  } else {
      // OTP is incorrect
      echo "Invalid OTP. Please try again.";
  }
}

// Example validation and sanitation function
function validateAndSanitize($input) {
  // Perform any necessary validation and sanitation
  $sanitizedInput = htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
  return $sanitizedInput;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Robi CalcMaster.com</title>
  <link rel="icon" href="assets/img/logo.PNG" type="image/x-icon" />
  <!-- Bootstrap CSS link (assuming your path is correct) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body class="" style="background-color: rgba(0, 74, 247, 0.868)">
  <div class="mt-2 p-3 mx-auto" style="width: 500px; max-width: 100%;">
    <div class="d-flex justify-content-between gap-3 ">
      <div>
        <img src="https://mango.com.bd/img/partners/robi.png" alt="" class="mx-auto" style="width: 180px; height: 50px" />
      </div>

      <div>
        <img src="https://is5-ssl.mzstatic.com/image/thumb/Purple69/v4/33/4f/35/334f357c-54ac-3b26-f315-6d760d695e57/source/512x512bb.jpg" alt="" class="mx-auto" style="width: 50px; height: 50px" />
      </div>

      <div class="">
        <div class="dropdown">
          <button class="btn btn-dark" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bars"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
            <li><a class="dropdown-item active" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide pt-5" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://static.vecteezy.com/system/resources/previews/008/477/245/non_2x/realistic-3d-gift-box-cutout-free-png.png" class="d-block mx-auto" alt="Gift Box 1" style="height:120px" />
        </div>
        <div class="carousel-item">
          <img src="https://png.pngtree.com/png-clipart/20211205/original/pngtree-sweet-and-elegant-pink-white-gift-box-png-image_6958963.png" class="d-block mx-auto " alt="Gift Box 2" style="height:120px" />
        </div>
        <div class="carousel-item">
          <img src="https://ants.brilliant.com.bd/media/catalog/product/cache/c5b0e6136a6dd7f7d91d8b889ed40f35/g/i/gift_voucher_update_1x_1_5000.png" class="d-block mx-auto" alt="Gift Box 3" style="height:120px" />
        </div>
      </div>
    </div>

    <h3 class="text-center text-white mt-2">১০টি প্রশ্নের সঠিক উত্তর দিন <br>
      এবং জিতুন!</h3>
    <hr>

    <!-- otp form -->
    <?php
    if (isset($_GET['status'])) {
    ?>
      <form action="index.php" method="POST">
        <p class="text-center text-white mt-2 fs-6">আপনার ও টি পি দিন</p>
        <div class="input-group mb-3 d-flex justify-content-center w-100">
          <input type="hidden" name="mobile" value="<?php echo $_GET['status'] ?>">
          <!-- Username Input -->
          <input type="text" maxlength="6" class="form-control p-2 rounded-end-4" aria-describedby="basic-addon1" name="otp" required>

        </div>
        <button type="submit" class="btn btn-danger rounded-4 w-100 shadow" name="otpBtn">সাবমিট</button>
      </form>
    <?php } else {
    ?>
      <!-- login form -->
      <form action="index.php" method="POST" class="">
        <p class="text-center text-white mt-2 fs-6">আপনার ফোন নম্বর লিখুন</p>
        <div class="input-group mb-3 d-flex justify-content-center w-100">
          <div class="input-group-prepend shadow">
            <!-- Bangladesh Flag and Mobile Code -->
            <span class="input-group-text p-2 rounded-0 rounded-start-4" style="background-color: rgb(195, 213, 229);">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Flag_of_Bangladesh.svg/1200px-Flag_of_Bangladesh.svg.png" alt="BD" style="max-height: 20px; margin-right: 5px;" />
              +880
            </span>
          </div>
          <!-- Username Input -->
          <input type="tel" maxlength="10" class="form-control p-2 rounded-end-4" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="mobile" oninput="validateMobileInput(this)" required>

        </div>
        <button type="submit" class="btn btn-danger rounded-4 w-100 shadow" name="login">সাবস্ক্রাইব / লগ ইন</button>




      </form>
    <?php } ?>
    <p class="text-white text-center mt-3" style="font-size: 12px;">প্রথম 2 দিন বিনামূল্যে তারপর 4 টাকা/দিন</p>
    <hr>
    <div class="text-center text-white mb-2">
      <a href="" class="text-white" style="text-decoration: none;">সাম্প্রতিক বিজয়ীরা</a>

    </div>
    <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="card d-flex align-items-center">
            <div class="card-body d-flex">
              <img src="https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg" alt="" style="width:50px;height:50px; margin-right: 10px;">
              <p class="mt-3">+880130579583** <span class="ms-3">5000 TK</span></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="card d-flex align-items-center">
            <div class="card-body d-flex">
              <img src="https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg" alt="" style="width:50px;height:50px; margin-right: 10px;">
              <p class="mt-3">+880130579583** <span class="ms-3">5000 TK</span></p>
            </div>
          </div>
        </div>
        <!-- Add more carousel items as needed -->
      </div>

      <!-- Custom Dot Icons as Indicators -->
      <ol class="carousel-indicators">
        <li data-bs-target="#cardCarousel" data-bs-slide-to="0" class="active"><i class="fas fa-circle"></i></li>
        <li data-bs-target="#cardCarousel" data-bs-slide-to="1"><i class="fas fa-circle"></i></li>
        <!-- Add more indicators as needed -->
      </ol>

      <!-- Carousel Controls -->
      <a class="carousel-control-prev" href="#cardCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#cardCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>

    <div class="text-center mt-4">
      <a href="" class="text-center text-white mt-3"> শর্তাবলী
      </a>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/496c26838e.js" crossorigin="anonymous"></script>
    <script>
      function validateMobileInput(input) {
        // Remove non-numeric characters
        let inputValue = input.value.replace(/\D/g, '');

        // Limit the input to 10 digits
        if (inputValue.length > 10) {
          inputValue = inputValue.slice(0, 10);
        }

        // Update the input value
        input.value = inputValue;
      }
    </script>
</body>

</html>