<?php

include 'db_connection.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$email = $_POST['email'];
$subject = $_POST['subject'];

$stmt = $conn->prepare("INSERT INTO teachers (first_name, last_name, age, email, subject) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $first_name, $last_name, $age, $email, $subject);

if ($stmt->execute()) {
    header("Location: allteatch.php");
    exit();
} else {
    echo '<div class="alert alert-danger mt-3">Error: ' . htmlspecialchars($stmt->error) . '</div>';
}

$stmt->close();
$conn->close();