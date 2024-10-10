<?php 

require '../config/dbConnection.php';

    $id = $dbConnection->real_escape_string($_POST['id']);
    $User = $dbConnection->real_escape_string($_POST['user']);
    $Password = $dbConnection->real_escape_string($_POST['password']);
    $Role = $dbConnection->real_escape_string($_POST['userRole']);
    
    $sqlUsers = "UPDATE users
    SET userName = '$User', userPassword = '$Password', userRoleID = $Role
    WHERE userID = $id";

if ($dbConnection->query($sqlUsers)) {
}

header ('Location: Users.php');