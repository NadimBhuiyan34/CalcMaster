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

        <section class="" style="color: rgb(239, 230, 230);">
            <h1>১০০ সেকেন্ডস সার্ভিসটির জন্য সকল শর্তাবলী</h1>
            <hr>
            <h3>ভূমিকা:</h3>
            <p style="text-align: justify;">এই সার্ভিসটি রবি আজিয়াটা লিমিটেড (“রবি”) দ্বারা পরিচালিত । সার্ভিসটিতে অংশগ্রহণ করার মাধ্যমে, আপনি (নিচে বর্ণনা করা) সকল নিয়ম সমূহতে (শর্তাবলী এবং প্রয়োজনীয়তায় ") আবদ্ধ হতে সম্মত হয়েছেন । <br>
                ১০০ সেকেন্ড খেলাটি একটি তাৎক্ষণিক পুরুস্কার জয়লাভ করার মত ট্রিভিয়া খেলা। যেখানে প্রথমে খেলাটি সাবসস্ক্রাইব করতে হবে এবং ক্রেডিট গ্রহণ করতে হবে,যার প্রতি ১ ক্রেডিট সর্বোচ্চ ১ বার ব্যবহার করে প্রতি ১০ সেকেন্ড বা তার কম সময়ে ১০ টি প্রশ্নের সঠিক উত্তর দিতে হবে। যে সব গ্রাহকরা প্রতি ১০ সেকেন্ডে ১০ টি সঠিক প্রশ্নের উত্তর দিতে পারবে তাদের জন্যে নিচে উল্লেখিত পুরুস্কার সমূহ রয়েছে। এছাড়া প্রতিটি প্রশ্নের উত্তর দিলে "সঠিক বা ভুল" পয়েন্ট দেওয়া হবে এবং প্রতি মাসের শেষে সর্বাধিক পয়েন্ট সহ এক জন গ্রাহক একটি মাসিক পুরুস্কার জিতবেন।</p>
            <h3>সার্ভিসিটির সময়কাল:</h3>
            <p style="text-align: justify;">এই সার্ভিসটি 02/02/2023 থেকে শুরু হবে এবং রবি কর্তৃক পরবর্তী সমাপ্তির ঘোষণা না হওয়া পর্যন্ত চলবে। এই সার্ভিসের যে কোনো প্রকার পদক্ষেপ একমাত্র রবির নিজস্ব বিবেচনার অধীন থাকবে।</p>
            <h3>নির্বাচিত হবার যোগ্যতা:</h3>
            <p style="text-align: justify;">এই সার্ভিসটি রবির সমস্ত নতুন এবং বিদ্যমান প্রি-পেইড এবং পোস্ট-পেইড গ্রাহকদের জন্য প্রযোজ্য হবে এবং গ্রাহকদেড় অবশ্যই পুরস্কার প্রদানের তারিখ পর্যন্ত বিদ্যমান সেই সক্রিয় নম্বরটি রাখতে,যেটি দ্বারা সে খেলায় অংশগ্রহন করেছিল।</p> <br>
            <span>পরিষেবাটি নিম্নলিখিত ব্যক্তিদের জন্য প্রযোজ্য হবে না:</span>
            <li>কর্পোরেট গ্রাহক, মানে যে কর্পোরেট প্রতিষ্ঠানে কর্মরত আছেন। সন্দেহ এড়ানোর জন্য, গ্রাহকরা তাদের ব্যক্তিগত মোবাইল নম্বর ব্যবহার করে এই সেবায় অংশগ্রহণ করতে পারেন।</li>
            <li>রবি কর্মচারী (এর সংশ্লিষ্ট কর্পোরেশন সহ) ("কর্মচারী") এবং তাদের নিকটবর্তী পরিবারের সদস্যরা</li>
            <li>রবির ডিলার এবং ডিস্ট্রিবিউটরদের প্রতিনিধি, কর্মচারী এবং/অথবা এজেন্ট</li>
            <li>রবি বা অন্য কোন টেলিযোগাযোগ সার্ভিস প্রদানকারীর কালো তালিকাভুক্ত গ্রাহক</li>
            <li>“আইডিয়া সলিউশন” লিমিটেডের সমস্ত কর্মচারী (এর সাথে সম্পর্কিত কর্পোরেশন সকল কর্মচারী") এবং এই সার্ভিসের জন্য রবি-কে সহযোগিতাকারী সংস্থাগুলির পরিবারের সদস্যরা।</li>
            <span>স্পষ্টতার জন্য, পরিবারের অন্য সদস্যরা হবেন কর্মচারীর পত্নীরা, এবং/অথবা পিতামাতা, ভাইবোনরা এবং শিশুরা</span>
            <h3>সার্ভিস মেকানিক্স:</h3>
            <li>1. গ্রাহকরা রবি থেকে বিজ্ঞাপন পাবেন, সম্প্রচারিত এসএমএস হিসাবে বা অন্য যেকোন আকারে রবি এই সার্ভিসটি প্রচারের ক্ষেত্রে উপযুক্ত মনে করবে৷</li>
            <li>2. এই সার্ভিসটিতে অংশগ্রহণ করার জন্য, গ্রাহকরা ১০০ সেকেন্ড ("100 সেকেন্ডের খেলা") এর সদস্যতা যে ভাবে নিবেন:</li>
            <ul style="list-style-type: none;">
                <li style="position: relative; padding-left: 1.5em;">
                    1. ক. শর্ট কোড 21213 এ "100s" লিখে পাঠাবেন
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>
                <li style="position: relative; padding-left: 1.5em;">
                    2. খ. আমাদের ওয়েব পেজ https://robi.100seconds.com ভিজিট করে
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>
                <li style="position: relative; padding-left: 1.5em;">
                    3. গ. USSD কমান্ড *213*8118# ব্যবহার করে.
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>
                <li style="position: relative; padding-left: 1.5em;">
                    4. ঘ. রবির নিজস্ব সহযোগী অ্যাপ ব্যবহার করে.
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>
                <li style="position: relative; padding-left: 1.5em;">
                    5. (এখানে "সাবস্ক্রিপশন" হিসাবে উল্লেখ করা হয়েছে)
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>
            </ul>
            <li>3. ১০০ সেকেন্ডের গেমে সফল সাবস্ক্রিপশনের পরে, গ্রাহকরা রবির কাছ থেকে এসএমএস নিশ্চিতকরণ পাবেন, যার সাথে সংশ্লিষ্ট ক্রেডিট, পয়েন্ট এবং গেমটি অ্যাক্সেস করার লিঙ্ক পাবেন।</li>
            <li>4. নতুন গ্রাহকরা প্রথম ২ দিনের জন্য বিনামূল্যে সদস্যতা নেওয়ার পর। ফ্রি ট্রায়াল করার যে সুযোগ গুলো পাবেন</li>

            <ul style="list-style-type: none;">
                <li style="position: relative; padding-left: 1.5em;">
                    ক. ১০০ সেকেন্ডের ওয়েব গেমের জন্য দুটি (2) গেম ক্রেডিট পাবেন.
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>
                <li style="position: relative; padding-left: 1.5em;">
                    খ. পঞ্চাশ (৫০) পয়েন্ট পাবেন.
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>

            </ul>
            <li>5. তৃতীয় দিন থেকে, দৈনিক সাবস্ক্রিপশন চার্জ প্রযোজ্য হবে প্রতিদিন ৪ টাকা (কর সহ মোট মূল্য ৫.৩৪ টাকা।</li>
            <li>6. যদি গ্রাহককে দৈনিক সাবস্ক্রিপশন চার্জের সম্পূর্ণ পরিমাণে চার্জ করতে ব্যর্থ হয় সার্ভিস থেকে, আর যদি গ্রাহকের অ্যাকাউন্টের ব্যালেন্স ৪ টাকার কম থাকে কিন্তু ২ টাকার বেশি থাকে, তাহলে সর্বাধিক ২ টাকা কেটে নেওয়া হবে এবং গ্রাহক এর জন্যে ১ ক্রেডিট পাবেন ২ ক্রেডিট এর পরবিবর্তে এবং 100 সেকেন্ডে 1 গেম খেলতে পারবে ৷</li>
            <li>7. বিনামূল্যে অফার শুধুমাত্র একবার প্রযোজ্য. যে গ্রাহকরা আগে সার্ভিসটি সাবস্ক্রাইব করেছিলেন পরে আনসাবস্ক্রাইব করে এবং পরে আবার পুনরায় সাবস্ক্রাইব করবেন,তাদের কোন বিনামূল্যের অফার ছাড়াই তাত্ক্ষণিকভাবে চার্জ করা হবে৷</li>
            <li>8. যদি গ্রাহকের মোবাইল অ্যাকাউন্টে অপর্যাপ্ত ক্রেডিট থাকে, তাহলে ক্রেডিট উপলব্ধতার উপর স্বয়ংক্রিয় পুনর্নবীকরণ উপলব্ধ করা হবে। সন্দেহ এড়ানোর জন্য, অপর্যাপ্ত ক্রেডিট থাকা সত্ত্বেও গ্রাহকদের দ্বারা সংগৃহীত পয়েন্টগুলি আগের মতোই থাকবে। গ্রাহকরা তাদের মোবাইল ক্রেডিট উপলব্ধ হলে বিদ্যমান সঞ্চিত পয়েন্টগুলির সাথে ১০০ সেকেন্ডের গেমটি পুনরায় শুরু করতে পারেন।</li>
            <li>9. গ্রাহক ইচ্ছে করলে ২১২১৩ নাম্বারে "STOP 100s" লিখে পাঠিয়ে যে কোনো সময় সদস্যতা ত্যাগ করতে পারবেন। যখন গ্রাহকরা পরিসেবা মেয়াদ শেষ হওয়ার আগে পরিসেবা থেকে সদস্যতা ত্যাগ করলে তখন তারা আর পরিসেবাটিতে সদস্যতা পাবেন না তার সাথে সাথে আর কোনো গেম ক্রেডিট ও পাবেন না।এই ধারা অনুসারে, গ্রাহকরা সফলভাবে সদস্যতা ত্যাগ করার পরে অফার করা পুরস্কারের জন্য আর যোগ্য হবেন না।</li>
            <li>10. এছাড়া অতিরিক্ত হিসেবে গ্রাহকরা আমাদের ওয়েবপেইজের মাধ্যমে ৪ টাকা (কর সহ মোট মূল্য ৫.৩৪ টাকা) হারে ২ টি অতিরিক্ত গেম ক্রেডিট কিনতে পারবেন। এছাড়া অতিরিক্ত যত ইচ্ছে ততো কিনতে পারবেন সার্ভিস চলা কালীন সময়ের মধ্যে।</li>
            <li>11. খেলার ক্রেডিট ক্রয় সফল করার পরে,উপরের ধারা ৮ এর নির্ধারিত হিসাবে,খেলা শুরু করতে পারবেন গ্রাহকরা. এছাড়া-</li>
            <ul style="list-style-type: none;">
                <li style="position: relative; padding-left: 1.5em;">
                    ক. 100 সেকেন্ডের খেলার জন্য দুটি (২) গেম ক্রেডিট; এবং
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>
                <li style="position: relative; padding-left: 1.5em;">
                    খ. মাসিক পুরস্কারের জন্য পঞ্চাশ (৫০) পয়েন্ট।
                    সমস্ত ক্রেডিট, ইস্যু করার সময় থেকে ২৪ ঘন্টা পর্যন্তু বৈধ।
                    <span style="content: '○'; position: absolute; left: 0;">○</span>
                </li>
               
            </ul>
            <li>12. গ্রাহকরা ওয়েবপেজের মাধ্যমে,১০০ সেকেন্ডের গেম এই লিংকের মাধ্যমে খেলতে পারবেন https://robi.100seconds.com।</li>
                <li>13. ১০০ সেকেন্ডের ওয়েব গেমের ফলাফলের ভিত্তিতে, সঠিক এবং ভুল উত্তরের সংখ্যা গ্রাহকদের নিম্নরূপ পয়েন্ট দিয়ে পুরস্কৃত করা হয়:করা হয়:</li>
                <table class="table table-bordered" style="background-color: red;">
                    <thead>
                        <th>সঠিক উত্তরের সংখ্যা</th>
                        <th>খেলা শেষে অর্জনকৃত পয়েন্ট</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ওয়েবে প্রদানকৃত প্রতিটি ভুল উত্তরের জন্যে</td>
                            <td>৫ পয়েন্ট</td>
                        </tr>
                        <tr>
                            <td>ওয়েবে প্রদানকৃত প্রতিটি সঠিক উত্তরের জন্যে</td>
                            <td>২০ পয়েন্ট</td>
                        </tr>

                    </tbody>
                </table>

        </section>








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