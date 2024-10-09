<?php 

require '../config/dbConnection.php';

    $User = $dbConnection->real_escape_string($_POST['user']);
    $Password = $dbConnection->real_escape_string($_POST['password']);
    $Role = $dbConnection->real_escape_string($_POST['userRole']);

    $sqlUsers = "INSERT INTO users(userName, userPassword, userRoleID) 
    VALUE ('$User', '$Password', $Role)";

if ($dbConnection->query($sqlUsers)) {
    $id = $dbConnection->insert_id;
}

header ('Location: Users.php');