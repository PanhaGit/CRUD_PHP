<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "php_crud";


$connect = new mysqli($host, $username, $password, $db);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$first_name = "";
$last_name = "";
$gender = "";
$address = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $address =  $_POST['address'];

    if ($first_name == "" || $last_name == "" || $gender == "" || $address == "") {
        echo "
            <script>
                alert('Please fill out all fields.');
            </script>
        ";
    }

    $sqlInsert = "INSERT  INTO users (first_name,last_name,gender,address) VALUES ('$first_name','$last_name','$gender','$address')";
    $result = $connect->query($sqlInsert);
    if (!$result) {
        die("Error add data");
    }

    header("location: ./index.php");
    exit;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-dark text-white">
    <div class="container">
        <div class="mt-5 w-50 mx-auto ">
            <h1 class="text-center">Add User</h1>
            <form class="form-label" method="POST">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control mb-3" placeholder="First Name" required>

                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control mb-3" placeholder="Last Name" required>

                <label for="gender" class="form-label">Gender:</label>
                <input type="text" id="gender" name="gender" class="form-control mb-3" placeholder="Gender" required>

                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>

                <input type="submit" value="Add" class="btn btn-primary w-100 mt-4">
            </form>
        </div>
    </div>
</body>

</html>