<?php

    include '../config/dbConnection.php';

    $id = $dbConnection->real_escape_string($_POST['surgeryID']);

    $sqlSpecialities = "SELECT surgeryID, surgeryName FROM surgery_type 
    WHERE surgeryID = $id LIMIT 1";
    $speResult = $dbConnection->query($sqlSpecialities);

    $rowSpe = $speResult->num_rows;

    $speciality = [];

    if ($rowSpe > 0) {
        $speciality = $speResult->fetch_array();
    }

echo json_encode($speciality, JSON_UNESCAPED_UNICODE);