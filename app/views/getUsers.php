<?php

include '../config/dbConnection.php';

$id = $dbConnection->real_escape_string($_POST['userID']);

$sqlUsers = "SELECT userID, userName, userPassword, userRoleID FROM users WHERE userID = $id LIMIT 1";
$usersResult = $dbConnection->query($sqlUsers);

$rowUsers = $usersResult->num_rows;

$users = [];

if ($rowUsers > 0) {
    $users = $usersResult->fetch_array();
}

echo json_encode($users, JSON_UNESCAPED_UNICODE);
