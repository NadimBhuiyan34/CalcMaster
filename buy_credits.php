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
 
 

// Function to handle form submission for adding credits
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_credits'])) {
    // Check if user is logged in (you should have session validation logic)
    if (!isset($_SESSION['user_id'])) {
        echo "Session expired or unauthorized access.";
        exit;
    }

    // Include your database connection script (adjust the path as needed)
    require 'config.php';

    // Define user ID from session (you should sanitize this input)
    $userId = $_SESSION['user_id'];

    // Check user's current balance
    $sqlCheckBalance = "SELECT `balance` FROM `users` WHERE `id` = $userId";
    $resultBalance = $connection->query($sqlCheckBalance);

    if ($resultBalance->num_rows > 0) {
        $row = $resultBalance->fetch_assoc();
        $currentBalance = $row['balance'];

        // Check if balance is above the minimum threshold (e.g., 5.56)
        $minimumBalance = 5.56;
        if ($currentBalance < $minimumBalance) {
            $creditsUpdateMessage = "Insufficient balance. Please add funds.";
        } else {
            // Update query to increment credits by 2 and points by 50 (adjust SQL syntax based on your database schema)
            $sqlCredits = "UPDATE `users` SET `credits` = `credits` + 2, `points` = `points` + 50, `balance` = `balance` - 5.56 WHERE `id` = $userId";

            // Perform the update
            if ($connection->query($sqlCredits) === TRUE) {
                $creditsUpdateMessage = "You have been successfully charged with 4 Taka. Click on the PLAY button below to start the game";
            } else {
                $creditsUpdateMessage = "Error updating credits: " . $connection->error;
            }
        }
    } else {
        $creditsUpdateMessage = "Error: User not found.";
    }

    // Redirect back to buy_credits.php with message
    header("Location: buy_credits.php?message=" . urlencode($creditsUpdateMessage));
    exit;

    // Close database connection
    $connection->close();
}



?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Robi CalcMaster.com/buy_credits</title>
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
       
      
       
     
       
       
<div class="pt-2">
<div class="card p-2">
    <?php if (isset($_GET['message'])): ?>
        <p class="text-center <?php echo (strpos($_GET['message'], 'Error') !== false) ? 'text-danger' : 'text-success'; ?> fw-bold p-2" style="font-size: 14px;"><?php echo $_GET['message']; ?></p>
        
        <?php if ($_GET['message'] == 'Insufficient balance. Please add funds.'): ?>
           
            <form method="post" action="buy_credits.php" class="text-center">
                <button name="add_credits" class="btn w-75 fs-3 fw-bold text-white mx-auto" style="background-color: rgb(28, 159, 8);">
                    Add 2 Credits <i class="fa-solid fa-crown circle fs-5 text-dark" style="border: 2px solid yellow; border-radius: 50%; padding: 5px;"></i>
                </button>
            </form>
        <?php else: ?>
          <a href="game.php" class="text-center">
                <button name="add_credits" class="btn w-75 fs-3 fw-bold text-white mx-auto" style="background-color: rgb(28, 159, 8);">
                    Play
                </button>
            </a>
        <?php endif; ?>
        
    <?php else: ?>
        <p class="text-center text-danger fw-bold p-2" style="font-size: 14px;">You will get 2 credits for 4 Taka, to proceed press Add 2 Credits </p>
        <form method="post" action="buy_credits.php" class="text-center">
            <button name="add_credits" class="btn w-75 fs-3 fw-bold text-white mx-auto" style="background-color: rgb(28, 159, 8);">
                Add 2 Credits <i class="fa-solid fa-crown circle fs-5 text-dark" style="border: 2px solid yellow; border-radius: 50%; padding: 5px;"></i>
            </button>
        </form>
    <?php endif; ?>

    <span class="text-center pb-5 fw-bold pt-1" style="font-size: 12px;">Note: Your daily subscription credits will be automatically renewed.</span>
</div>

</div>


        
         
          <div class="card p-2 w-100 rounded-5 mt-3 shadow text-center text-white rounded-3" style="background-color: #741fb5;">
            <a href="" class="w-100 text-white" style="text-decoration: none;">
                <i class="fa-solid fa-user-plus fs-2"></i>
               
              <span style="" class="fs-5 pb-1 fw-bold">GET FREE 2 CREDITS</span>
            </a>
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
