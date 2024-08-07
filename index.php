<?php
include 'config.php';
session_start();

// Assuming $connection is your database connection object

// Validate and sanitize the mobile number


if (isset($_POST['login'])) {
  $mobile = isset($_POST['mobile']) ? mysqli_real_escape_string($connection, $_POST['mobile']) : '';

  if (!empty($mobile)) {
    // Check if the mobile number exists
    $checkQuery = "SELECT `id`, `mobile`, `status`, `draw_date` FROM `users` WHERE `mobile` = '$mobile'";
    $result = $connection->query($checkQuery);

    if ($result->num_rows > 0) {
      $userData = $result->fetch_assoc();

      if ($userData['status'] == 'Verified') {
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['mobile'] = $userData['mobile'];
        $_SESSION['mobile'] = $userData['mobile'];
        $_SESSION['date'] = $userData['draw_date'];
        header("Location: dashboard.php");
        exit();
      } else {
        // Generate a new OTP
        $newOtp = rand(100000, 999999);

        // Update the OTP in the database
        $otpUpdateQuery = "UPDATE `users` SET `otp` = '$newOtp' WHERE `id` = " . $userData['id'];
        $connection->query($otpUpdateQuery);

        // Redirect to index.php with the new OTP
        header("Location: index.php?status=" . urlencode($userData['mobile']));
        exit();
      }
    } else {
      // Mobile number does not exist, insert new user with OTP
      $otp = rand(100000, 999999);
      $insertQuery = "INSERT INTO `users`(`mobile`, `otp`, `status`) VALUES ('$mobile', '$otp', 'Unverify')";
      $user = $connection->query($insertQuery);

      if ($user) {
        header("Location: index.php?status=" . urlencode($mobile));
        exit();
      }
    }
  } else {
    echo "Mobile number is empty.";
  }
} else {
  // Handle the case where 'login' is not set

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
    // Fetch the data as an associative array
    $userData = $result->fetch_assoc();

    // OTP is correct, update status in the users table
    $updateQuery = "UPDATE `users` SET status = 'Verified' WHERE mobile = '$mobile'";
    $connection->query($updateQuery);

    // Set session variables for login
    $_SESSION['mobile'] = $userData['mobile'];
    $_SESSION['user_id'] = $userData['id'];

    // Redirect to the dashboard or any other page after successful login
    header("Location: dashboard.php");
    exit();
  } else {
    // OTP is incorrect
    echo "Invalid OTP. Please try again.";
  }
}

// Example validation and sanitation function
function validateAndSanitize($input)
{
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
  <title>GP.100seconds.com</title>
  <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
  <!-- Bootstrap CSS link (assuming your path is correct) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <style>
    @keyframes slideInRight {
      0% {
        transform: translateX(-100%);
      }

      50% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(100%);
      }
    }

    @keyframes slideInLeft {
      0% {
        transform: translateX(100%);
      }

      50% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(-100%);
      }
    }

    .animated-icon-right {
      animation: slideInRight 1s linear infinite;
      /* Faster animation */
    }

    .animated-icon-left {
      animation: slideInLeft 1s linear infinite;
      /* Faster animation */
    }

    /* Ensure the input group and button have the same width */
    .form-control {
      width: calc(100% - 50px);
      /* Adjust as needed to match the input group's width */
    }

    .btn {
      width: calc(100% - 50px);
      /* Adjust as needed to match the input group's width */
    }
  </style>
</head>

<body class="" style="background-color: rgba(226, 88, 13, 0.868)">
  <div class="mt-2 p-3 mx-auto" style="width: 550px; max-width: 100%;">
    <!-- header section -->
    <?php include_once 'header.php' ?>
    <!-- end header section -->
    <!-- carousel section -->
    <?php include_once 'carousel.php' ?>
    <!-- end carousel section -->


    <h4 class="text-center text-white mt-2 ">১০টি প্রশ্নের সঠিক উত্তর দিন <br>
      এবং জিতুন!</h4>


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
      <form action="index.php" method="POST" class="px-5 text-center">
        <p class="text-center text-white mt-3" style="font-size: 12px;">আপনার ফোন নম্বর লিখুন</p>
        <div class="input-group mb-3 d-flex justify-content-center w-100 mx-auto">
          <i class="fa-solid fa-angles-right fs-2 pt-1 text-dark animated-icon-right"></i>
          <div class="input-group-prepend shadow">
            <!-- Bangladesh Flag and Mobile Code -->
            <span class="input-group-text p-2 rounded-0 rounded-start-4" style="background-color: rgb(195, 213, 229);">
              <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Flag_of_Bangladesh.svg/1200px-Flag_of_Bangladesh.svg.png" alt="BD" style="max-height: 20px; margin-right: 5px;" />
              +880
            </span>
          </div>
          <!-- Username Input -->
          <input type="tel" maxlength="10" class="form-control rounded-end-4" placeholder="" aria-label="Username" aria-describedby="basic-addon1" name="mobile" oninput="validateMobileInput(this)" required>
          <i class="fa-solid fa-angles-left fs-2 text-dark pt-1 animated-icon-left"></i>
        </div>
        <div class="">
          <button type="submit" class="btn py-2 fw-bold text-white rounded-4 shadow text-center" name="login" style="border-bottom: 7px solid rgba(0, 0, 0, 0.368); background-color: rgb(14, 113, 13);">সাবস্ক্রাইব / লগ ইন</button>
        </div>
      </form>

    <?php } ?>
    <p class="text-white text-center mt-3" style="font-size: 12px;"> চার্জ 4 টাকা/দিন</p>

    <div class="text-center text-white mb-2">
      <a href="" class="text-white" style="text-decoration: none;">সাম্প্রতিক বিজয়ীরা</a>

    </div>
    <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        $sqlresult = "SELECT * FROM `winers` WHERE status = 'active' ORDER BY id DESC LIMIT 5";
        $result3 = $connection->query($sqlresult);
        $isActive = true; // Variable to track the first item
        while ($row3 = $result3->fetch_assoc()) {
        ?>
          <div class="carousel-item <?php echo $isActive ? 'active' : ''; ?>">
            <div class="card d-flex align-items-center">
              <div class="card-body d-flex">
                <img src="https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg" alt="" style="width:50px;height:50px; margin-right: 10px;">
                <p class="mt-3">+880<?php echo htmlspecialchars($row3['mobile']); ?> </p>
              </div>
            </div>
          </div>
        <?php
          $isActive = false; // Set to false after the first iteration
        }
        ?>
      </div>

      <!-- Custom Dot Icons as Indicators -->
      <ol class="carousel-indicators">
        <?php
        $result3->data_seek(0); // Reset the result pointer
        $i = 0;
        while ($row3 = $result3->fetch_assoc()) {
        ?>
          <li data-bs-target="#cardCarousel" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>"><i class="fas fa-circle"></i></li>
        <?php
          $i++;
        }
        ?>
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
      <a href="terms.php" class="text-center text-white mt-3"> শর্তাবলী
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