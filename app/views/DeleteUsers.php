<?php 

require '../config/dbConnection.php';

    $id = $dbConnection->real_escape_string($_POST['id']);

    $sqlUsers = "DELETE FROM users WHERE userID = $id";

if ($dbConnection->query($sqlUsers)) {
}

header ('Location: Users.php');