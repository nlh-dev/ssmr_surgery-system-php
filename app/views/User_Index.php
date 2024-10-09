<!--SQL CONECTION AND INJECTION-->
<?php

require '../config/dbConnection.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>USER_INDEX VIEW</h1>
</body>
</html>