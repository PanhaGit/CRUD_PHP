<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "php_crud";


$connect = new mysqli($host, $username, $password, $db);


if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sqlDelete = "DELETE FROM users WHERE id = $id";
    $connect->query($sqlDelete);
} else {
    echo "Invalid or missing ID.";
}

header("Location: ./index.php");
exit;
