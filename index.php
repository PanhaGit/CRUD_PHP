<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "php_crud";

$connect = new mysqli($host, $username, $password, $db);

if ($connect->connect_error) {
    die("Error connect to DB" . $connect->connect_error);
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body class="bg-dark text-white">
    <div class="my-5 container">
        <h1 class="text-center my-5">PHP CRUD</h1>
        <a href="./add.php">
            <button class="btn btn-success">Add</button>
        </a>
        <table class="table table-striped table-dark mx-auto w-75 border border-secondary">
            <thead>
                <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php

                $sql = "SELECT * FROM users";
                $result = $connect->query($sql);
                if (!$result) {
                    die("Error get data");
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                            <tr>
                                <td>$row[first_name]</td>
                                <td>$row[last_name]</td>
                                <td>$row[gender]</td>
                                <td>$row[address]</td>
                                <td>
                                    <a href='./edit.php?id=$row[id]'>
                                        <button class='btn btn-primary me-2'>Edit</button>
                                    </a>
                                    <a href = './delete.php?id=$row[id]'>
                                        <button class='btn btn-danger'>Delete</button>
                                    </a>
                                </td>
                            </tr>
                    ";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>