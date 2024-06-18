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
$id = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: ./index.php");
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";


    $result = $connect->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "Error: No data found for ID $id";
        header("Location: ./index.php");
        exit;
    }


    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $gender = $row['gender'];
    $address = $row['address'];
} else {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $id = $_POST['id'];

    if (empty($first_name) || empty($last_name) || empty($address) || empty($gender)) {
        echo "
            <script>
                alert('All field cannot empty');
            </script>
        ";
        die();
    }

    $sqlEdit = "UPDATE users SET first_name =' $first_name' , last_name=  '$last_name' ,gender = '$gender' WHERE id = $id";
    $result  = $connect->query($sqlEdit);

    if (!$result) {
        echo "
            <script>
                alert('Edit not success!!!');
            </script>
        ";
        die();
    }


    header("Location: ./index.php");
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
            <h1 class="text-center">Edit User</h1>
            <form class="form-label" method="POST">
                <input type="hidden" id="id" name="id" class="form-control mb-3" required value="<?php echo $id; ?>">

                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control mb-3" placeholder="First Name" required value="<?php echo $first_name; ?>">

                <label for="last_name" class="form-label">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control mb-3" placeholder="Last Name" required value=" <?php echo $last_name; ?>">

                <label for="gender" class="form-label">Gender:</label>
                <input type="text" id="gender" name="gender" class="form-control mb-3" placeholder="Gender" required value="<?php echo $gender; ?>">

                <label for="address" class="form-label">Address:</label>
                <input type="text" id="address" name="address" class="form-control" placeholder="Address" required value="<?php echo $address; ?>">

                <input type="submit" value="Edit" class="btn btn-primary w-100 mt-4">
            </form>
        </div>
    </div>
</body>

</html>