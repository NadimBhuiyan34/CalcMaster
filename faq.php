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

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        1. আমি কিভাবে গেমটি অ্যাক্সেস করব?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" style="font-size: 13px;">আপনি লিংকের মাধ্যমে গেমটি অ্যাক্সেস করতে পারেন: gp.100seconds.com</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        2. জিপির ১০০ সেকেন্ড কি ?
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" style="font-size: 13px; text-align:justify">100 সেকেন্ডস একটি তাত্ক্ষণিক পুরস্কার জিতার খেলা যা রবি গ্রাহকদের জন্য উপলব্ধ। সাবস্ক্রাইব করার মাধ্যমে, অংশগ্রহণকারীরা সীমাহীন কুইজ খেলতে এবং মূল্যবান পুরস্কার জেতার সুযোগ দাবি করতে পারবে। অংশগ্রহণকারীরা একটি গেমের মধ্যে 10টি প্রশ্নের সঠিক উত্তর দিলে, তাদের 5,000 টাকার ভাউচারের তাত্ক্ষণিক বিজয়ী ঘোষণা করা হবে। দৈনিক ভিত্তিতে, অংশগ্রহণকারীরা 100 সেকেন্ডের 2টি গেম খেলতে 2 ক্রেডিট পান। অংশগ্রহণকারীরা সঠিক এবং ভুল উভয় উত্তরের জন্য পয়েন্ট সংগ্রহ করে। প্রতি মাসের মধ্যে সর্বাধিক সংগৃহীত পয়েন্ট সহ অংশগ্রহণকারী একটি মাসিক পুরস্কার জিতবে।</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        3. গেমটি খেলার জন্য আমি কত টাকা দিতে পারি ?
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" style="font-size: 13px; text-align:justify">সাবস্ক্রিপশনের প্রথম দুই দিন বিনামূল্যে এবং অংশগ্রহণকারীরা প্রতিদিন 2টি ক্রেডিট পান। সাবস্ক্রিপশনের তৃতীয় দিন থেকে শুরু করে এবং তার পরে, খরচ প্রতিদিন 4 টাকা, যেখানে অংশগ্রহণকারী গেমটি খেলার জন্য 2 ক্রেডিট পায় এবং প্রতি ক্রয় 4 টাকায় অতিরিক্ত সীমাহীন গেম কিনতে পারে, যা 2 ক্রেডিটও দেয়।</div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        4. গেম খেলার বিষয়ে আমি কোথায় সাহায্য বা নির্দেশ পেতে পারি ?
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" style="font-size: 13px; text-align:justify">সাবস্ক্রিপশনের প্রথম দুই আপনি https://gp.100seconds.com-এ নির্দেশাবলী পাবেন</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive" style="line-height: 1.8;">
                        5. আমি যদি সাবস্ক্রিপশন নিয়ে থাকি, তাহলে আমার সাবস্ক্রিপশন কতক্ষন স্থায়ী হবে ?
                    </button>
                </h2>

                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" style="font-size: 13px; text-align:justify;">আপনার সদস্যতা স্বয়ংক্রিয়ভাবে পুনর্নবীকরণ করা হবে যতক্ষণ না আপনি আনসাবস্ক্রাইব করেন৷</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix" style="line-height:">
                        6. আমার কাছে ১০ টি প্রশ্ন চালানোর জন্য উপলব্ধ ক্রেডিট নেই, এর অর্থ কী ?
                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" style="font-size: 13px; text-align:justify">আপনি আপনার উপলব্ধ সমস্ত ক্রেডিট ব্যবহার করেছেন৷ আপনি gp.100seconds.com এ অতিরিক্ত ক্রেডিট কিনতে পারেন</div>
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