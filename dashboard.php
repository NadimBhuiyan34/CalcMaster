<?php
session_start();
require 'config.php';
 

 
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Robi CalcMaster.com</title>
    <link rel="icon" href="assets/img/logo.PNG" type="image/x-icon" />
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

  <body class="" style="background-color: rgba(0, 74, 247, 0.868)">
    <div class="mt-2 p-3 mx-auto" style="width: 500px; max-width: 100%;">
      <div class="d-flex justify-content-between gap-3 ">
        <div>
          <img
            src="https://mango.com.bd/img/partners/robi.png"
            alt=""
            class="mx-auto"
            style="width: 180px; height: 50px"
          />
        </div>

        <div>
          <img
            src="https://is5-ssl.mzstatic.com/image/thumb/Purple69/v4/33/4f/35/334f357c-54ac-3b26-f315-6d760d695e57/source/512x512bb.jpg"
            alt=""
            class="mx-auto"
            style="width: 50px; height: 50px"
          />
        </div>

        <div class="">
          <div class="dropdown">
            <button
              class="btn btn-dark"
              type="button"
              id="dropdownMenuButton2"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="fas fa-bars"></i>
            </button>
            <ul
              class="dropdown-menu dropdown-menu-dark"
              aria-labelledby="dropdownMenuButton2"
            >
              <li><a class="dropdown-item active" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>
              <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
          </div>
        </div>

      </div>
      
      <div class="text-center mt-4 bg-white p-2 rounded-4">
        <p class="text-dark fs-5 "><i class="fa-solid fa-mobile-retro"></i> 01305795830</p>
        <span class="badge rounded-pill bg-warning text-dark p-2 fs-6 ">15252 Points | 100 Credits</span>
  
      </div>
     
      <!-- carousel -->
      <div id="carouselExampleSlidesOnly" class="carousel slide pt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="https://static.vecteezy.com/system/resources/previews/008/477/245/non_2x/realistic-3d-gift-box-cutout-free-png.png"
              class="d-block mx-auto"
              alt="Gift Box 1" style="height:120px"
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://png.pngtree.com/png-clipart/20211205/original/pngtree-sweet-and-elegant-pink-white-gift-box-png-image_6958963.png"
              class="d-block mx-auto "
              alt="Gift Box 2" style="height:120px"
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://ants.brilliant.com.bd/media/catalog/product/cache/c5b0e6136a6dd7f7d91d8b889ed40f35/g/i/gift_voucher_update_1x_1_5000.png"
              class="d-block mx-auto"
              alt="Gift Box 3" style="height:120px"
            />
          </div>
        </div>
      </div>
      
       
       <hr>
        <div>
          <div class="card p-2">
            <p class="text-center text-primary fw-bold p-2">100 Seconds, 10 questions, BIG PRIZES !</p>
            <button class="btn mx-auto p-3 w-50 fs-3 shadow fw-bold text-white" style="background-color: rgb(50, 176, 24);">PLAY NOW</button>
            <?php
            // Set the target end date and time
            $targetDate = strtotime("2024-03-31 23:59:59");

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

            <h6 class="text-center pt-3">NEXT DRAW IN:</h6>
             
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
         
          <div class="card p-3 w-50 shadow text-center text-white rounded-3 border-3 border-dark" style="background-color: #890c81;">
            <a href="" class="w-100 text-white" style="text-decoration: none;">
                <i class="fa-solid fa-cart-plus fs-3"></i>
               
                <h6 class="fw-bold">GET 2 CREDITS</h6>
            </a>
        </div>
          <div class="card p-3 w-50 shadow text-center text-white rounded-3 border-3 border-dark" style="background-color: #890c81;">
            <a href="" class="w-100 text-white" style="text-decoration: none;">
                <i class="fa-solid fa-user-plus fs-3"></i>
                 
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
