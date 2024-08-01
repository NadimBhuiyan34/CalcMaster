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
    <title>GP.100seconds.com/faq</title>
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <!-- Bootstrap CSS link (assuming your path is correct) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />


</head>

<body class="" style="background-color: rgba(226, 88, 13, 0.868)">
    <div class="mt-2 p-3 mx-auto" style="width: 500px; max-width: 100%;">
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
                        <li><a class="dropdown-item fw-bold py-2" href="#" style="font-size: 14px;">বিজয়ীরা</a></li>
                        <li><a class="dropdown-item fw-bold py-2" href="#" style="font-size: 14px;">কিভাবে শুরু করবেন</a></li>
                        <li><a class="dropdown-item fw-bold py-2" href="index.php" style="font-size: 14px;">সাইন ইন</a></li>
                    </ul>
                </div>
            <?php } ?>
        </div>




        
        <div class="card" style="background-color: rgb(42, 180, 21);">
            <div class="card-body">
                
                <div class="card rounded-4 d-flex">
                    <?php   
                     $sqlresult = "SELECT * FROM `winers` WHERE status = 'active' ORDER BY id DESC";
                     $result3 = $connection->query( $sqlresult);
                     while ($row3 = $result3->fetch_assoc()) {
                      ?>
                    <div class="d-flex justify-content-between">
                        <div>
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSLU5_eUUGBfxfxRd4IquPiEwLbt4E_6RYMw&s" alt="" class="p-3" style="width:70px;height:70px"> 
                        </div>
                         <div class="my-auto">
                            <span>+880<?php echo $row3['mobile'] ?></span>
                         </div>
                        <div class="my-auto px-2">
                            <p class="pt-3"><?php echo $row3['updated_date'] ?></p>
                        </div>
                    </div>
                   
                    <?php } ?>
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