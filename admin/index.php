<?php

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

require 'config.php';

// fetch data from table
mysqli_set_charset($connection, "utf8");

$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$items_per_page = 10;
$offset = ($current_page - 1) * $items_per_page;

$query = "SELECT * FROM abcquiz_ques_bank ORDER BY quid DESC LIMIT $items_per_page OFFSET $offset";
$result = mysqli_query($connection, $query);

// Calculate total pages for pagination
$total_rows_query = "SELECT COUNT(*) AS total FROM abcquiz_ques_bank";
$total_rows_result = mysqli_query($connection, $total_rows_query);
$total_rows = mysqli_fetch_assoc($total_rows_result)['total'];
$total_pages = ceil($total_rows / $items_per_page);



// insert data from csv file

use SimpleExcel\SimpleExcel;

if (isset($_POST['import'])) {

    if (move_uploaded_file($_FILES['excel_file']['tmp_name'], $_FILES['excel_file']['name'])) {
        require_once('SimpleExcel/SimpleExcel.php');

        $excel = new SimpleExcel('csv');

        $excel->parser->loadFile($_FILES['excel_file']['name']);

        $foo = $excel->parser->getField();

        $count = 1;


        while (count($foo) > $count) {
            $question = $foo[$count][0];
            $answerA = $foo[$count][1];
            $answerB = $foo[$count][2];
            $answerC = $foo[$count][3];
            $answerD = $foo[$count][4];
            $correctAnswer = $foo[$count][5];
            mysqli_set_charset($connection, "utf8");
            $qid_ownQuery = "SELECT MAX(qid_own) AS max_qid FROM abcquiz_ques_bank";
            $maxQidResult = mysqli_query($connection, $qid_ownQuery);

            $maxQid_own = $maxQidResult->fetch_assoc()["max_qid"];
            $qid_own = $maxQid_own + 1;


            $queryInsert = "INSERT INTO abcquiz_ques_bank (qid_own, ques, ans_a, ans_b, ans_c, ans_d, answer)
                    VALUES ('$qid_own', '$question', '$answerA', '$answerB', '$answerC', '$answerD', '$correctAnswer')";

            mysqli_query($connection, $queryInsert);
            $count++;
        }
        $message = "Record inserted successfully.";

        // Redirect to the index.php page with the message
        header("Location: index.php?message=" . urlencode($message));
        exit;
    } else {
        $message = "You do not upload file.";

        // Redirect to the index.php page with the message
        header("Location: index.php?message=" . urlencode($message));
        exit;
    }
}


// insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["addNew"])) {
        $question = $_POST["question"];
        $answerA = $_POST["answerA"];
        $answerB = $_POST["answerB"];
        $answerC = $_POST["answerC"];
        $answerD = $_POST["answerD"];
        $correctAnswer = $_POST["correctAnswer"];

        // Get the maximum qid_own
        mysqli_set_charset($connection, "utf8");

        $qid_ownQuery = "SELECT MAX(qid_own) AS max_qid FROM abcquiz_ques_bank";
        $maxQidResult = mysqli_query($connection, $qid_ownQuery);

        $maxQid_own = $maxQidResult->fetch_assoc()["max_qid"];
        $qid_own = $maxQid_own + 1;

        // Insert the new question
        $queryInsert = "INSERT INTO abcquiz_ques_bank (qid_own, ques, ans_a, ans_b, ans_c, ans_d, answer)
                    VALUES ('$qid_own', '$question', '$answerA', '$answerB', '$answerC', '$answerD', '$correctAnswer')";

        if (mysqli_query($connection, $queryInsert)) {

            $message = "Record inserted successfully.";

            // Redirect to the index.php page with the message
            header("Location: index.php?message=" . urlencode($message));
            exit;
        } else {
            echo "Error: " . mysqli_error($connection);
        }
        $connection->close();
    }

    // edit data

    if (isset($_POST["editQuestion"])) {
        $quid = $_POST["quid"];
        $question = $_POST["question"];
        $answerA = $_POST["answerA"];
        $answerB = $_POST["answerB"];
        $answerC = $_POST["answerC"];
        $answerD = $_POST["answerD"];
        $correctAnswer = $_POST["correctAnswer"];

        mysqli_set_charset($connection, "utf8");
        $updateQuery = "UPDATE abcquiz_ques_bank SET ques='$question', ans_a='$answerA', ans_b='$answerB', ans_c='$answerC', ans_d='$answerD', answer='$correctAnswer' WHERE quid='$quid'";

        if (mysqli_query($connection, $updateQuery)) {
            $message = "Record updated successfully.";

            mysqli_close($connection);

            // Redirect to the index.php page with the message
            header("Location: index.php?message=" . urlencode($message));
            exit;
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }


    // Delete data
    if (isset($_POST['questionId']) && !empty($_POST['questionId'])) {

        $questionId = mysqli_real_escape_string($connection, $_POST['questionId']);

        // SQL query to delete the question
        $deleteQuery = "DELETE FROM abcquiz_ques_bank WHERE quid = '$questionId'";

        // Execute the query
        if (mysqli_query($connection, $deleteQuery)) {
            $message = "Record deleted successfully.";

            // Redirect to the index.php page with the message
            header("Location: index.php?message=" . urlencode($message));
            exit;
        } else {
            echo "Error deleting question: " . mysqli_error($connection);
        }

        // Close the database connection
        mysqli_close($connection);
    } else {
        echo "Invalid question ID";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Quiz Questions</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Include necessary CSS and JS files for your datatable library (e.g., DataTables) -->
    <!-- Add links to DataTables CSS and JavaScript CDN here -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


</head>

<body>


    <div class="container">
        <div class="text-center">
            <img src="logo.png" alt="">

        </div>
        <?php
        if (isset($_GET['message'])) {
            $message = $_GET['message'];
        ?>
            <div class="fixed-alert" style="position: fixed;top: 10px;right: 300px; z-index: 1000">
                <div class="alert text-white shadow" role="alert" style="background-color: green;">
                    <i class="fa-solid fa-check fa-bounce fa-2xl mr-2"></i>
                    <?php echo $message ?>

                    <div class="progress mt-2" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

            </div>

            <script>
                // Remove the message parameter from the URL on page load
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.pathname);
                }
            </script>
        <?php
        }
        ?>






        <div class="card">
            <div class="card-header d-flex">
                <div class="d-flex gap-2">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="fa-solid fa-plus fa-bounce"></i> Add New
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#uploadFile">
                            <i class="fa-solid fa-cloud-arrow-up fa-beat"></i> Upload CSV File
                        </button>
                    </div>
                    <div class="mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search question...">
                    </div>
                    <!-- file upload modal -->
                    <div class="modal fade" id="uploadFile" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-info">
                                    <h5 class=" text-center mx-auto" id="uploadModalLabel">Upload CSV File <i class="fa-solid fa-file-csv fa-beat"></i></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p id="uploadMessage" class="text-center mt-3 text-danger"></p>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="excelFile" class="form-label">Select CSV File to Upload:</label>
                                            <input type="file" class="form-control" name="excel_file" id="excelFile" accept=".csv">
                                        </div>
                                        <div class="mx-auto d-flex">
                                            <button type="submit" class="btn btn-primary btn-sm mx-auto" name="import" id="uploadButton">
                                                <i class="fa-solid fa-cloud-arrow-up fa-beat"></i> Upload
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div>

                </div>
            </div>
            <div class="card-body">

                <div class="container">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Question</th>
                                <th>Answer A</th>
                                <th>Answer B</th>
                                <th>Answer C</th>
                                <th>Answer D</th>
                                <th>Correct Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php
                            $serialNumber = 1;

                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $serialNumber++; ?></td>
                                    <td><?php echo $row['ques']; ?></td>
                                    <td><?php echo $row['ans_a']; ?></td>
                                    <td><?php echo $row['ans_b']; ?></td>
                                    <td><?php echo $row['ans_c']; ?></td>
                                    <td><?php echo $row['ans_d']; ?></td>
                                    <td><?php

                                        if ($row['answer'] == 1) {
                                            echo "A";
                                        } elseif ($row['answer'] == 2) {
                                            echo "B";
                                        } elseif ($row['answer'] == 3) {
                                            echo "C";
                                        } elseif ($row['answer'] == 4) {
                                            echo "D";
                                        } else {
                                            echo "no answer";
                                        }


                                        ?></td>
                                    <td class="d-flex gap-2">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['quid']; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <form action="" method="post" class="deleteForm">
                                            <input type="hidden" name="questionId" value="<?php echo $row['quid']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" name="deleteData">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <!-- edit modal -->
                                    <div class="modal fade" id="editModal<?php echo $row['quid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST" accept-charset="UTF-8">
                                                        <div class="form-group">
                                                            <label for="question">Question:</label>
                                                            <textarea class="form-control" id="question" name="question" rows="3" required><?php echo $row['ques']; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="answerA">Answer A:</label>
                                                            <input type="text" class="form-control" id="answerA" name="answerA" value="<?php echo $row['ans_a']; ?>" required>
                                                        </div>

                                                        <input type="hidden" name="quid" value="<?php echo $row['quid']; ?>">

                                                        <div class="form-group">
                                                            <label for="answerB">Answer B:</label>
                                                            <input type="text" class="form-control" id="answerB" name="answerB" value="<?php echo $row['ans_b']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="answerC">Answer C:</label>
                                                            <input type="text" class="form-control" id="answerC" name="answerC" value="<?php echo $row['ans_c']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="answerD">Answer D:</label>
                                                            <input type="text" class="form-control" id="answerD" name="answerD" value="<?php echo $row['ans_d']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="correctAnswer">Correct Answer:</label>
                                                            <select class="form-control" id="correctAnswer" name="correctAnswer" required>
                                                                <option value="" class="disabled">Select Correct Answer</option>
                                                                <option value="1" <?php if ($row['answer'] == 1) echo "selected"; ?>>A</option>
                                                                <option value="2" <?php if ($row['answer'] == 2) echo "selected"; ?>>B</option>
                                                                <option value="3" <?php if ($row['answer'] == 3) echo "selected"; ?>>C</option>
                                                                <option value="4" <?php if ($row['answer'] == 4) echo "selected"; ?>>D</option>
                                                            </select>
                                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-sm" name="editQuestion">Save Change <i class="fa-solid fa-paper-plane"></i></button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end edit modal -->
                                </tr>





                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- Pagination links -->
                    <div class="text-center">
                        <p>Total Entries: <?php echo $total_rows; ?></p>
                    </div>

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <!-- Previous Button -->
                            <li class="page-item <?php echo ($current_page === 1) ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">Previous</span>
                                </a>
                            </li>

                            <!-- Display a subset of page numbers -->
                            <?php
                            $max_visible_pages = 10; // Adjust this number as needed
                            $start_page = max(1, $current_page - floor($max_visible_pages / 2));
                            $end_page = min($total_pages, $start_page + $max_visible_pages - 1);

                            for ($i = $start_page; $i <= $end_page; $i++) {
                            ?>
                                <li class="page-item <?php echo ($i === $current_page) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>

                            <!-- Next Button -->
                            <li class="page-item <?php echo ($current_page === $total_pages) ? 'disabled' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>


                </div>

            </div>
        </div>
        <!-- Add new modal -->


        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="question">Question:</label>
                                <textarea class="form-control" id="question" name="question" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="answerA">Answer A:</label>
                                <input type="text" class="form-control" id="answerA" name="answerA">
                            </div>
                            <div class="form-group">
                                <label for="answerB">Answer B:</label>
                                <input type="text" class="form-control" id="answerB" name="answerB">
                            </div>
                            <div class="form-group">
                                <label for="answerC">Answer C:</label>
                                <input type="text" class="form-control" id="answerC" name="answerC">
                            </div>
                            <div class="form-group">
                                <label for="answerD">Answer D:</label>
                                <input type="text" class="form-control" id="answerD" name="answerD">
                            </div>
                            <div class="form-group">
                                <label for="correctAnswer">Correct Answer:</label>
                                <select class="form-control" id="correctAnswer" name="correctAnswer" required>
                                    <option value="" class="disabled">Select Correct Answer</option>
                                    <option value="1">A</option>
                                    <option value="2">B</option>
                                    <option value="3">C</option>
                                    <option value="4">D</option>
                                </select>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="addNew">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/496c26838e.js" crossorigin="anonymous"></script>
    <!-- data table -->

    <script>
        // Function to hide the alert and progress bar after a delay
        function hideAlertAndProgressBar() {
            const duration = 5000; // 5000ms = 5 seconds
            const progressBar = $(".progress-bar");

            let progress = 0;
            const interval = 100; // 100ms interval for updating progress
            const steps = duration / interval;

            const updateProgressBar = setInterval(function() {
                progress += 100 / steps;
                progressBar.css("width", progress + "%");

                if (progress >= 100) {
                    clearInterval(updateProgressBar);
                    $(".fixed-alert").fadeOut(500, function() {
                        $(this).remove(); // Remove the entire .fixed-alert container
                    });
                }
            }, interval);
        }

        // Call the function when the page loads
        hideAlertAndProgressBar();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const tableBody = document.getElementById("tableBody").getElementsByTagName("tr");

            searchInput.addEventListener("input", function() {
                const searchText = searchInput.value.toLowerCase();

                for (const row of tableBody) {
                    const cells = row.getElementsByTagName("td");
                    let matchFound = false;

                    for (const cell of cells) {
                        if (cell.textContent.toLowerCase().includes(searchText)) {
                            matchFound = true;
                            break;
                        }
                    }

                    row.style.display = matchFound ? "" : "none";
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Handle delete form submissions
            $(".deleteForm").submit(function(event) {
                if (!confirm("Are you sure you want to delete this row?")) {
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const uploadButton = document.getElementById("uploadButton");
            const uploadMessage = document.getElementById("uploadMessage");

            uploadButton.addEventListener("click", function() {
                // Display the icon and message
                uploadMessage.innerHTML = '<i class="fa-solid fa-upload fa-bounce"></i> Uploading... Please wait.';
            });
        });
    </script>


</body>
</body>

</html>