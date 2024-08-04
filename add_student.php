<?php

include 'db_connection.php';
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$stmt = $conn->prepare("INSERT INTO students (name, age, email) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $name, $age, $email);



if ($stmt->execute()) {
    header("Location: students.php");
    exit();
} else {
    echo '<div class="alert alert-danger mt-3">Error: ' . htmlspecialchars($stmt->error) . '</div>';
}


$stmt->close();
$conn->close();
