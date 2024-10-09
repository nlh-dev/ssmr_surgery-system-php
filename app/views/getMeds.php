<?php

include '../config/dbConnection.php';

$id = $dbConnection->real_escape_string($_POST['medID']);

$sqlGetMeds = "SELECT medID, medFullName FROM doctors 
WHERE medID = $id LIMIT 1";
$medsResult = $dbConnection->query($sqlGetMeds);

$rowMeds = $medsResult->num_rows;

$meds = [];

if ($rowMeds > 0) {
    $meds = $medsResult->fetch_array();
}

echo json_encode($meds, JSON_UNESCAPED_UNICODE);