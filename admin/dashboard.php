<?php
session_start();
require '../config.php';

if (!$_SESSION['user_id']) {
    header("Location: index.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['win'])) {
    // Collect the form data
    // Make sure this value is included in your form
    $winnerMobile = $_POST['mobile']; // Make sure this value is included in your form
    $winnerPoints = $_POST['point']; // Make sure this value is included in your form
    $nextDrawDate = $_POST['date']; // This will be in YYYY-MM-DD format
    $month = $_POST['month']; // This will be in YYYY-MM-DD format

    // Prepare the SQL queries
    $sqlinsert =
        $updateSql = "INSERT INTO `winers`(`mobile`, `point`, `month`, `status`) VALUES ('$winnerMobile','$winnerPoints','$month','pending')";

    if ($connection->query($updateSql)) {
        $sqlupdate = "UPDATE `users` SET `draw_date`='$nextDrawDate'";

        if ($connection->query($sqlupdate)) {
            header('dashboard.php');
            exit();
        }
    }
    // Begin transaction


    // Close the connection

}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['publish'])) {
    // Collect the form data
    $id = $_POST['id'];

    // Get the current date
    $currentDate = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS

    // Prepare the SQL query to update the winer's status to active and set the updated_date
    $sqlUpdate = "
        UPDATE winers
        SET status = 'active', updated_date = '$currentDate'
        WHERE id = '$id'
    ";

    if ($connection->query($sqlUpdate)) {
        // Redirect to the dashboard page after successful update
        header('Location: dashboard.php');
        exit;
    } else {
        die('Error updating winner: ' . $connection->error);
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GP.100seconds.com</title>
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <!-- Bootstrap CSS link (assuming your path is correct) -->
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
    <div class="mt-2 p-3 mx-auto" style="width: 500px; max-width: 100%;">

        <!-- header section -->
        <?php include_once 'header.php' ?>
        <!-- end header section -->





        <div class="pt-2">
            <div class="card p-2">
                <?php if (isset($_GET['message'])) { ?>
                    <p class="text-center <?php echo (strpos($_GET['message'], 'Error') !== false) ? 'text-danger' : 'text-success'; ?> fw-bold p-2" style="font-size: 14px;"><?php echo $_GET['message']; ?></p>
                <?php } ?>















                <?php
                // Set the target end date and time
                $targetDate = strtotime("2024-08-31 23:59:59");

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

                <h6 class="text-center pt-3" style="font-size: 13px;"><i class="fa-solid fa-clock"></i> NEXT DRAW IN:</h6>

                <div class="d-flex gap-4 mx-auto">
                    <div class="d-flex flex-column">
                        <input type="text" class="text-center rounded-2 p-1 fw-bold fs-4 border-2 border-info shadow" value="<?php echo $days; ?>" style="width:50px">
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


        <div class="mx-auto  mt-3">

            <div class="card mx-auto p-3 w-50 shadow text-center text-white rounded-3 border-3 border-dark" style="background-color: #3b0168;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Enter Next Draw
                </button>
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Declare Winer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="dashboard.php" method="POST">
                                <?php
                                $sql = "
        SELECT id, mobile, points, draw_date
        FROM users
        ORDER BY points DESC
        LIMIT 1
    ";
                                $result1 = $connection->query($sql);
                                $row1 = $result1->fetch_assoc();
                                ?>
                                <label for="mobile" class="form-label">Winner Mobile</label>
                                <input type="text" id="mobile" class="form-control" name="mobile" value="<?php echo $row1['mobile']; ?>">
                                <label for="point" class="form-label">Winner Points</label>
                                <input type="text" id="point" class="form-control" name="point" value="<?php echo $row1['points']; ?>">
                                <?php
                                $dateObject = new DateTime($row1['draw_date']);
                                $formattedDate = $dateObject->format('d F Y');
                                ?>
                                <div class="form-group">
                                    <label>Month:</label>
                                    <input type="text" class="form-control" name="month" value="<?php echo htmlspecialchars($formattedDate); ?>">
                                </div>
                                <label for="date" class="form-label">Next Draw Date</label>
                                <input type="date" id="date" class="form-control" name="date" required>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="win">Save changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center text-white mb-2 mt-2">
                <a href="" class="text-white" style="text-decoration: none;">বর্তমান ফলাফল</a>

            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Point</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $sql1 = "
                SELECT id, mobile, points
                FROM users
                ORDER BY points DESC
                LIMIT 5
            ";

                            $result1 = $connection->query($sql1);

                            if ($result1 === false) {
                                echo '<tr><td colspan="4">Error fetching users: ' . $connection->error . '</td></tr>';
                            } else {
                                $rank = 1;
                                while ($row2 = $result1->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $rank++; ?></th>

                                        <td><?php echo htmlspecialchars($row2['mobile']); ?></td>
                                        <td><?php echo htmlspecialchars($row2['points']); ?></td>
                                    </tr>
                            <?php
                                }
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>




            <div class="card mt-3">
                <div class="card-body">
                <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Point</th>
                                <th scope="col">Month</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php


                            $sqlresult = "SELECT * FROM `winers` ORDER BY id DESC
                LIMIT 5";

                            $result3 = $connection->query( $sqlresult);

                            if ($result3 === false) {
                                echo '<tr><td colspan="4">Error fetching users: ' . $connection->error . '</td></tr>';
                            } else {
                                $rank = 1;
                                while ($row3 = $result3->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <th scope="row"><?php echo $rank++; ?></th>

                                        <td><?php echo htmlspecialchars($row3['mobile']); ?></td>
                                        <td><?php echo htmlspecialchars($row3['point']); ?></td>
                                        <td><?php echo htmlspecialchars($row3['month']); ?></td>
                                        <td>
                                            <?php if($row3['status'] == 'pending'){
                                             ?>
                                            <form action="dashboard.php" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $row3['id'] ?>">
                                                <button class="btn btn-sm btn-success" type="submit" name="publish">Publish</button>
                                            </form>
                                            <?php } ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }


                            ?>
                        </tbody>
                </table>
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