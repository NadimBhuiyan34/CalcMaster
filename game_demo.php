<?php
session_start();
require 'config.php';

if (!$_SESSION['mobile']) {
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
    <title>Robi CalcMaster.com</title>
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <!-- Bootstrap CSS link (assuming your path is correct) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/496c26838e.js" crossorigin="anonymous"></script>
    <style>
        .countdown-box {
            display: inline-block;
            margin-right: 10px;
        }

        .question {
            display: none;
        }
        .progress {
            height: 20px;
        }
        .input-field {
            width: 20px;
        }
        @media (min-width: 768px) {
            .input-container, .progress-container {
                width: 380px;
            }
            .input-field {
                width: 30px;
            }
        }
   
    </style>

</head>

<body class="" style="background-color: rgba(226, 88, 13, 0.868)">
    <div class="mt-2 p-3 mx-auto" style="width: 500px; max-width: 100%;">

        <!-- header section -->
        <?php include_once 'header.php' ?>
        <!-- end header section -->
    </div>




    <div class="mt-2 p-3 mx-auto" style="width: 700px; max-width: 100%;">
        <div class="pt-2">
            <div class="card p-2" style="background-color: rgb(99, 1, 156);">
                <!-- question number input -->
                <div class="d-flex gap-2 justify-content-center text-center flex-wrap">
                    <input type="text" value="" class="rounded-3 text-center bg-dark input-field">
                    <input type="text" value="" class="rounded-3 text-center bg-dark input-field">
                    <input type="text" value="3" class="rounded-3 text-center input-field">
                    <input type="text" value="" class="rounded-3 text-center bg-success input-field">
                    <input type="text" value="" class="rounded-3 text-center bg-success input-field">
                    <input type="text" value="" class="rounded-3 text-center bg-success input-field">
                    <input type="text" value="" class="rounded-3 text-center bg-success input-field">
                    <input type="text" value="" class="rounded-3 text-center bg-success input-field">
                    <input type="text" value="" class="rounded-3 text-center bg-success input-field">
                    <input type="text" value="" class="rounded-3 text-center bg-success input-field">
                </div>
                <!-- progress bar -->
                <div class="progress mt-4" style="width: 100%;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <!-- question -->
                <div class="mt-4">
                    <h4 class="text-center text-white">
                        <span class="d-none d-md-inline">নীলদর্পন নাটকটি ইংরেজীতে অনুবাদ করেন-</span>
                        <span class="d-inline d-md-none">নীলদর্পন নাটকটি<br class="d-md-none"> ইংরেজীতে অনুবাদ করেন-</span>
                    </h4>
                </div>

                <!-- option -->

                <div class="text-center d-flex flex-column px-3 gap-2 mt-3 mb-3">
                    <button class="btn btn-white bg-white w-100 px-2 mb-2 py-2">প্রমথ চৌধুরী</button>
                    <button class="btn btn-white bg-white w-100 px-2 mb-2 py-2">মাইকেল মধুসূদন দত্ত</button>
                    <button class="btn btn-white bg-white w-100 px-2 mb-2 py-2">দ্বিজেন্দ্রলাল রায়</button>
                    <button class="btn btn-white bg-white w-100 px-2 mb-2 py-2">প্যারীচাঁদ মিত্র</button>
                </div>
            </div>
        </div>
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