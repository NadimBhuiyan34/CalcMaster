<?php
// Include database connection
require 'config.php';
session_start();
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
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch correct answers (assuming `correctAnswers` is a comma-separated string)
    $correctAnswers = explode(',', $_POST['correctAnswers']);
   $userId = $_SESSION['user_id'];
    // Initialize variables for score, points, and results
    $score = 0;
    $results = array();

    foreach ($_POST['userAnswers'] as $quid => $userAnswer) {
        $quid = intval($quid); // Ensure $quid is an integer
        $correctAnswer = $correctAnswers[$quid];

        if ($userAnswer == $correctAnswer) {
            $score++;
           
        } else {
             
        }
    }

    // Calculate points based on score
    $basePoints = 25; // Points for the first correct answer
    $additionalPoints = 22; // Points added for each subsequent correct answer
    $points1 = $basePoints + ($score - 1) * $additionalPoints;

    // Update points and deduct credits from user's account
   // Replace with actual user ID, fetched from session or login info
    $creditsToDeduct = 1; // Number of credits to deduct

    // Prepare SQL statement to update user's points and credits
    $sql = "UPDATE `users` SET `points` = `points` + $points1, `credits` = `credits` - $creditsToDeduct WHERE `id` = $userId";

    // Execute the SQL statement
    $updatePointsResult = $connection->query($sql);
     

     
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Robi CalcMaster.com</title>
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/496c26838e.js" crossorigin="anonymous"></script>
    <style>
        .countdown-box {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>
<body class="" style="background-color: rgba(226, 88, 13, 0.868)">
    <div class="mt-2 p-3 mx-auto" style="width: 700px; max-width: 100%;">
        <!-- Include header -->
        <?php include_once 'header.php'; ?>
        <div class="pt-2">
            <div class="card p-2 question" id="question<?php echo $index; ?>" style="background-color: rgb(51, 0, 80);">
                <h4 class="text-center fw-bold" style="color: rgb(9, 210, 9);">EXCELLENT KNOWLEDGE!! KEEP GOING</h4>
                <span class="text-center text-white fw-bold fs-4">Your Scored:</span>
            
                <div class="mx-auto" style="text-align: center; position: relative;">
                    <img src="assets/img/points-bg.png" alt="" style="width:350px;height:300px;display: block; margin: 0 auto;">
                    <span class=" fs-3 fw-bold" style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%); color: rgb(6, 57, 3); font-weight: bold;">
                        <?php echo $points1; ?> <br> Points
                    </span>
                    <h5 class="text-center text-white fw-bold">You have answered</h5>
                    <h5 class="text-center text-white fw-bold"><?php echo $score; ?>/10 correct questions</h5>
                </div>

                <div class="text-center">
                    <a href="game.php" class="btn text-white fw-bold border border-1 border-white" style="background-color: rgb(9, 171, 9);">PLAY AGAIN</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
