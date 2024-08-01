<?php
include 'config.php';

// Check if the current date is the 26th
if (date('j') == 1) {
    // Get the current month and year
    $currentMonth = date('Y-m'); // Format: YYYY-MM

    // Step 1: Fetch the top user for the current month
    $sql = "
        SELECT id, mobile, points
        FROM users
        WHERE DATE_FORMAT(created_at, '%Y-%m') = ?
        ORDER BY points DESC
        LIMIT 1
    ";

    $stmt = $connection->prepare($sql);
    if ($stmt === false) {
        die('Error preparing statement: ' . $connection->error);
    }

    // Bind the parameter for the current month
    $stmt->bind_param('s', $currentMonth);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        die('Error fetching winners: ' . $connection->error);
    }

    $winner = $result->fetch_assoc();

    // Step 2: Insert the winner into the winners table
    if ($winner) {
        $insertSql = "INSERT INTO winners (id, mobile, point, month) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($insertSql);

        if ($stmt === false) {
            die('Error preparing statement: ' . $connection->error);
        }

        // Bind the parameters for the insert statement
        $stmt->bind_param('ssis', $winner['id'], $winner['mobile'], $winner['points'], $currentMonth);
        $stmt->execute();
        $stmt->close();
    }

    // Step 3: Update the users table to set all points to 0
    $updateSql = "UPDATE users SET points = 0";
    if ($connection->query($updateSql) === false) {
        die('Error updating users table: ' . $connection->error);
    }
}

// Close the connection
$connection->close();

echo "Script executed successfully.";
?>
