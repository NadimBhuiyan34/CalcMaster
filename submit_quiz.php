<?php
// Include database connection
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch correct answers (assuming `correctAnswers` is a comma-separated string)
    $correctAnswers = explode(',', $_POST['correctAnswers']);

    // Initialize variables for score and results
    $score = 0;
    $results = array();

    foreach ($_POST['userAnswers'] as $quid => $userAnswer) {
        $quid = intval($quid); // Ensure $quid is an integer
        $correctAnswer = $correctAnswers[$quid];

        if ($userAnswer == $correctAnswer) {
            $score++;
            $results[] = "Question {$quid}: Your Answer: {$userAnswer}, Correct Answer: {$correctAnswer}";
        } else {
            $results[] = "Question {$quid}: Your Answer: {$userAnswer}, Correct Answer: {$correctAnswer} (Incorrect)";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz Results</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h2 class="text-center">Quiz Results</h2>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Your Score: <?php echo $score; ?>/10</h5>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($results as $result): ?>
                            <li class="list-group-item"><?php echo $result; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
    </html>

    <?php
    exit; // Exit after displaying results to prevent further execution
}
?>
