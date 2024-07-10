<?php
session_start();
require 'config.php';

if(!$_SESSION['mobile'])
{
  header("Location: index.php");
}

// point blance and credits handle
$userId = $_SESSION['user_id'];
// Use prepared statement to prevent SQL injection
$pointSql = "SELECT `points`, `credits`, `balance` FROM `users` WHERE id = ?";
$stmt = mysqli_prepare($connection, $pointSql);

// Bind the parameter
mysqli_stmt_bind_param($stmt, "i", $userId);

// Execute the query
mysqli_stmt_execute($stmt);

// Bind the result variables
mysqli_stmt_bind_result($stmt, $points, $credits, $balance);

// Fetch the values
mysqli_stmt_fetch($stmt);

// Close the statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($connection);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GP.100seconds.com</title>
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <!-- Bootstrap CSS link (assuming your path is correct) -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/496c26838e.js" crossorigin="anonymous"></script>
    <style>
      .countdown-box {
          display: inline-block;
          margin-right: 10px;
      }
 
  </style>

  </head>

  <body class="" style="background-color: rgba(28, 112, 223, 0.868)">
    <div class="mt-2 p-3 mx-auto" style="width: 500px; max-width: 100%;">
    
      <!-- header section -->
       <?php include_once 'header.php' ?>
      <!-- end header section -->
       
      
       
     
      <!-- carousel -->
      <?php include_once 'carousel.php' ?>
      <!-- end of carousel -->
       
       
        <div class="pt-2">
          <div class="card p-2">
            <?php if (isset($_GET['message'])){ ?>
        <p class="text-center <?php echo (strpos($_GET['message'], 'Error') !== false) ? 'text-danger' : 'text-success'; ?> fw-bold p-2" style="font-size: 14px;"><?php echo $_GET['message']; ?></p>
        <?php } ?>
            <p class="text-center text-danger fw-bold p-2 fs-6">100 Seconds, 10 questions, BIG PRIZES !</p>
            <a href="game.php" class="text-center">
              <button class="btn w-75 fs-3 fw-bold text-white  shadow-3 rounded-3" style="border-bottom: 5px solid rgba(0, 0, 0, 0.368); background-color: rgb(14, 177, 11);">PLAY NOW</button>
          </a>
          
          
          
          



          
            




            <?php
            // Set the target end date and time
            $targetDate = strtotime("2024-07-31 23:59:59");

            // Get the current date and time
            $currentDate = time();

            // Calculate the remaining time in seconds
            $remainingTime = $targetDate - $currentDate;

            // Calculate days, hours, minutes, and seconds
            $days = floor($remainingTime / (60 * 60 * 24));
            $hours = floor(($remainingTime % (60 * 60 * 24)) / (60 * 60));
            $minutes = floor(($remainingTime % (60 * 60)) / 60);
            $seconds = $remainingTime % 60;
            ?>

            <h6 class="text-center pt-3" style="font-size: 13px;"><i class="fa-solid fa-clock"></i> NEXT DRAW IN:</h6>
             
            <div class="d-flex gap-4 mx-auto">
              <div class="d-flex flex-column">
                <input type="text" class="text-center rounded-2 p-1 fw-bold fs-4 border-2 border-info shadow" value="<?php echo $days; ?>" style="width:50px" >
                <label for="">Days</label>
              </div>
              <div class="d-flex flex-column">
                <input type="text" class="text-center rounded-2 p-1 fw-bold fs-4 border-info shadow" value="<?php echo $hours; ?>" style="width:50px">
                <label for="">Hours</label>
              </div>
              <div class="d-flex flex-column">
                <input type="text" class="text-center rounded-2 p-1 fw-bold fs-4 border-info shadow" value="<?php echo $minutes; ?>" style="width:50px">
                <label for="">Minutes</label>
              </div>
              <div class="d-flex flex-column">
                <input type="text" class="text-center rounded-2 p-1 fw-bold fs-4 border-info shadow" value="<?php echo $seconds; ?>" style="width:50px">
                <label for="">Seconds</label>
              </div>
             
              
            </div>
            
           
           
          </div>
        </div>
     

        <div class="d-flex gap-2 mt-3">
         
          <div class="card p-3 w-50 shadow text-center text-white rounded-3 border-3 border-dark" style="background-color: #3b0168;">
            <a href="buy_credits.php" class="w-100 text-white" style="text-decoration: none;">
                <i class="fa-solid fa-cart-plus fs-2"></i>
               
                <h6 class="fw-bold">GET 2 CREDITS</h6>
            </a>
        </div>
          <div class="card p-3 w-50 shadow text-center text-white rounded-3 border-3 border-dark" style="background-color: #3b0168;">
            <a href="" class="w-100 text-white" style="text-decoration: none;">
                <i class="fa-solid fa-user-plus fs-2"></i>
                 
                <h6 class="fw-bold">PLAY FOR FREE</h6>
            </a>
        </div>
        
         
        </div>

        <div class="text-center text-white mb-2 mt-2">
          <a href="" class="text-white" style="text-decoration: none;">সাম্প্রতিক বিজয়ীরা</a>

        </div>
        <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="card d-flex align-items-center">
                <div class="card-body d-flex">
                  <img src="https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg" alt="" style="width:50px;height:50px; margin-right: 10px;">
                  <p class="mt-3">+880130579583**    <span class="ms-3">5000 TK</span></p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="card d-flex align-items-center">
                <div class="card-body d-flex">
                  <img src="https://img.freepik.com/premium-vector/man-avatar-profile-picture-vector-illustration_268834-538.jpg" alt="" style="width:50px;height:50px; margin-right: 10px;">
                  <p class="mt-3">+880130579583**    <span class="ms-3">5000 TK</span></p>
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
      

        
      
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://kit.fontawesome.com/496c26838e.js"
      crossorigin="anonymous"
    ></script>
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
