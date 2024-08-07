<?php
include 'config.php';
session_start();

// Assuming $connection is your database connection object

// Validate and sanitize the mobile number


// Example validation and sanitation function

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GP.100seconds.com/how to play</title>
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <!-- Bootstrap CSS link (assuming your path is correct) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

 <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="" style="background-color: rgba(226, 88, 13, 0.868)">
    <div class="mt-2 p-3 mx-auto" style="width: 550px; max-width: 100%;">
        <!-- header section -->
        <?php include_once 'header.php' ?>
        <div class="text-end mb-2">

            <?php if (!isset($_SESSION['user_id'])) { ?>
                <div class="dropdown">
                    <button class="btn btn-white btn-sm text-white fs-2 text-end" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown">
                        <i class="fas fa-bars"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item fw-bold py-2" href="faq.php" style="font-size: 14px;">জিজ্ঞাসিত প্রশ্নাবলী</a></li>
                        <li><a class="dropdown-item fw-bold py-2" href="winer.php" style="font-size: 14px;">বিজয়ীরা</a></li>
                        <li><a class="dropdown-item fw-bold py-2" href="how_to_play.php" style="font-size: 14px;">কিভাবে শুরু করবেন</a></li>
                        <li><a class="dropdown-item fw-bold py-2" href="index.php" style="font-size: 14px;">সাইন ইন</a></li>
                    </ul>
                </div>
            <?php } ?>
        </div>
         

        <div class="card" style="font-size:14px; color:rgb(62, 16, 105);font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            <div class="card-body">
                <p>১০০ সেকেন্ড সাবস্ক্রিপশন করার পর আপনি ক্রেডিট পাবেন যা দিয়ে গেমটি খেলতে পারবেন।</p>
            </div>
        </div>
        <div class="card" style="font-size:14px; color:rgb(62, 16, 105)">
            <div class="card-body">
                <p>প্রতি ক্রেডিট দিয়ে আপনি একটি গেম খেলতে পারবেন যেখানে আপনাকে ১০ সেকেন্ড কম সময়ে ১০ টি প্রশ্নের উত্তর দিতে হবে।</p>
            </div>
        </div>
        <div class="card" style="font-size:14px; color:rgb(62, 16, 105)">
            <div class="card-body">
                <p>আপনি যদি একটি গেমের মধ্যে পরপর ১০ টি প্রশ্নের সঠিক উত্তর দেন, তাহলে আপনি একটি তাৎক্ষনিক পুরস্কার জিতবেন। </p>
            </div>
        </div>
        <div class="card" style="font-size:14px; color:rgb(62, 16, 105)">
            <div class="card-body">
                <p>এছাড়া প্রতিটি প্রশ্নের উত্তরে, সঠিক বা ভুল যাই হোক না কেন, আপনি পয়েন্ট পাবেন যা আপনাকে ড্র বা মাসিক পুরস্কারে অংশগ্রহনের অধিকারী করে। </p>
            </div>
        </div>
        <div class="card" style="font-size:14px; color:rgb(62, 16, 105)">
            <div class="card-body">
                <p>আনসাবস্ক্রাইব করতে, ২১২১৩ নম্বরে STOP 100S পাঠান। </p>
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