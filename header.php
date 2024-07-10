
<div class="d-flex justify-content-between ">
  <div class="pt-3">
    <span class="text-white fs-5">EN <i class="fa-solid fa-globe"></i></span>
  </div>

  <div>
    <img src="assets/img/logo1.png" alt="" class="pt-1" style="width: 70px; height: 70px" />
  </div>

  <div class="">
    <img src="assets/img/gp (1).png" alt="" class="pb-3" style="height:85px;width:100px">
     
  </div>

</div>

<?php if (isset($_SESSION['user_id'])) { ?>
  <div class="d-flex justify-content-between">

    <div class="">
    <div class="">
    <span class="text-white fw-bold" style="font-size: 13px;">+880<?php echo isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '0'; ?></span><br>
    <span class="badge rounded-pill  text-dark" style="background-color: #f6ff00;"><?php echo !empty($points) ? $points : '0'; ?> Points | <?php echo !empty($credits) ? $credits : '0'; ?> credits</span>
</div>

    </div>

    <div class="text-end"> <!-- Adjust margin as needed -->
      <div class="dropdown">
        <button class="btn btn-white text-white fs-2 text-end" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"
        style="outline: none; box-shadow: none;">
        <i class="fas fa-bars"></i>
    </button>
    
        <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownMenuButton2">

          <li><a class="dropdown-item" href="dashboard.php">Home</a></li>
          <li><a class="dropdown-item" href="#">FAQs</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item bg-danger rounded-2" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>