<div class="d-flex justify-content-between align-items-center">
    <!-- Carousel Container -->
    <div class="mx-auto mb-2">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/carosel/gift_instant-bn.png" class="d-block mx-auto" alt="Gift Box 1" style="height:220px" />
                </div>
                <div class="carousel-item">
                    <img src="assets/img/carosel/gift_Iphone-bn.png" class="d-block mx-auto" alt="Gift Box 2" style="height:220px" />
                </div>
            </div>
        </div>
    </div>

    <!-- Dropdown Container -->
    <div class="text-end " style="margin-bottom: 170px;">
         
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
</div>
