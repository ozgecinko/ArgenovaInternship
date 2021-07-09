<?php
include 'dbconnection.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();

if (!empty($_POST)) {
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Insert new record into the table
    $stmt = $pdo->prepare('INSERT INTO users VALUES (?, ?, ?)');
    $stmt->execute([$id, $username, $password]);

    header("location:panel/index.php");
}
?>