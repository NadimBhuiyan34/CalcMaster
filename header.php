<div class="d-flex justify-content-between gap-3 ">
  <div class="pt-2">
    <span class="text-white fs-5">EN <i class="fa-solid fa-globe"></i></span>
  </div>

  <div>
    <img src="assets/img/logo1.png" alt="" class="" style="width: 70px; height: 70px" />
  </div>

  <div class="">
    <img src="assets/img/gp (1).png" alt="" class="pb-2" style="height:85px;width:100px">
    <?php if (!isset($_SESSION['user_id'])) { ?>
    <div class="text-end"> <!-- Adjust margin as needed -->
      <div class="dropdown">
        <button class="btn btn-white text-white fs-2 text-end" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownMenuButton2">

          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item bg-danger rounded-2" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <?php } ?>
  </div>

</div>

<?php if (isset($_SESSION['user_id'])) { ?>
  <div class="d-flex justify-content-between">

    <div class="">
    <div class="">
    <span class="text-white fw-bold" style="font-size: 13px;">+880<?php echo isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '0'; ?></span><br>
    <span class="badge rounded-pill bg-warning text-dark"><?php echo !empty($points) ? $points : '0'; ?> Points | <?php echo !empty($credits) ? $credits : '0'; ?> credits</span>
</div>

    </div>

    <div class="text-end"> <!-- Adjust margin as needed -->
      <div class="dropdown">
        <button class="btn btn-white text-white fs-2 text-end" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-white" aria-labelledby="dropdownMenuButton2">

          <li><a class="dropdown-item" href="#">Another action</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item bg-danger rounded-2" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>