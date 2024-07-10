<?php
require 'config.php';

// Fetch 10 random questions
$sql = "SELECT `quid`, `qid_own`, `ques`, `ans_a`, `ans_b`, `ans_c`, `ans_d`, `answer` FROM `abcquiz_ques_bank` ORDER BY RAND() LIMIT 10";
$result = $connection->query($sql);

$questions = array();
$correctAnswers = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = $row;
        $correctAnswers[] = $row['answer'];
    }
} else {
    echo "0 results";
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Robi CalcMaster.com</title>
    <link rel="icon" href="assets/img/logo.png" type="image/x-icon" />
    <!-- Bootstrap CSS link (assuming your path is correct) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/496c26838e.js" crossorigin="anonymous"></script>
    <style>
        .countdown-box {
            display: inline-block;
            margin-right: 10px;
        }

        .question {
            display: none;
        }

        .progress {
            height: 20px;
        }

        .input-field {
            width: 20px;
        }

        @media (min-width: 768px) {
            .input-container,
            .progress-container {
                width: 380px;
            }

            .input-field {
                width: 30px;
            }
        }
    </style>
</head>

<body style="background-color: rgba(28, 112, 223, 0.868)">

    <div class="mt-2 p-3 mx-auto" style="width: 700px; max-width: 100%;">
    <?php include_once 'header.php' ?>
        <div class="pt-2">
            <form method="post" id="quizForm" action="submit_quiz.php">
                <div id="quizContainer">
                    <?php foreach ($questions as $index => $question) : ?>
                        <div class="card p-2 question" id="question<?php echo $index; ?>" style="background-color: rgb(99, 1, 156);">
                            <!-- question number input -->
                            <div class="d-flex gap-2 justify-content-center text-center flex-wrap">
                                <?php for ($i = 0; $i < 10; $i++): ?>
                                    <input type="text" value="<?php echo ($i == $index) ? $index + 1 : ''; ?>" class="rounded-3 text-center input-field <?php echo ($i == $index) ? 'bg-success' : 'bg-dark'; ?>" readonly>
                                <?php endfor; ?>
                            </div>
                            <!-- progress bar -->
                            <div class="progress mt-4" style="width: 100%;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <!-- question -->
                            <div class="mt-4">
                                <h4 class="text-center text-white">
                                    <span class="d-none d-md-inline"><?php echo $question['ques']; ?></span>
                                </h4>
                            </div>

                            <!-- option -->
                            <div class="text-center d-flex flex-column px-3 gap-2 mt-3 mb-3">
                                <button class="btn btn-white bg-white w-100 px-2 mb-2 py-2 answer-btn" type="button" data-question-index="<?php echo $index; ?>" data-answer="a"><?php echo $question['ans_a']; ?></button>
                                <button class="btn btn-white bg-white w-100 px-2 mb-2 py-2 answer-btn" type="button" data-question-index="<?php echo $index; ?>" data-answer="b"><?php echo $question['ans_b']; ?></button>
                                <button class="btn btn-white bg-white w-100 px-2 mb-2 py-2 answer-btn" type="button" data-question-index="<?php echo $index; ?>" data-answer="c"><?php echo $question['ans_c']; ?></button>
                                <button class="btn btn-white bg-white w-100 px-2 mb-2 py-2 answer-btn" type="button" data-question-index="<?php echo $index; ?>" data-answer="d"><?php echo $question['ans_d']; ?></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="correctAnswers" value="<?php echo implode(',', $correctAnswers); ?>">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentQuestion = 0;
        const questions = document.querySelectorAll('.question');

        function showQuestion(index) {
            if (index > 0) {
                questions[index - 1].style.display = 'none';
            }
            if (index < questions.length) {
                questions[index].style.display = 'block';
                startTimer(index);
            } else {
                document.getElementById('quizForm').submit();
            }
        }

        function startTimer(index) {
            let width = 0;
            const progressBar = questions[index].querySelector('.progress-bar');
            const interval = setInterval(() => {
                width += 1;
                progressBar.style.width = width + '%';
                if (width >= 100) {
                    clearInterval(interval);
                    showQuestion(index + 1);
                }
            }, 100);
            questions[index].querySelectorAll('.answer-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    clearInterval(interval);
                    showQuestion(index + 1);
                }, { once: true });
            });
        }

        showQuestion(0);
    </script>
</body>
</html>
