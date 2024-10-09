<?php

include '../config/dbConnection.php';

$id = $dbConnection->real_escape_string($_POST['patientsID']);

$slqGetPatients = "SELECT patientsID, patientsFullName, patientsMedID, patientsSurgeryTypeID, patientsStateID FROM patients 
WHERE patientsID = $id LIMIT 1";
$patientsResult = $dbConnection->query($slqGetPatients);

$rowPatients = $patientsResult->num_rows;

$patients = [];

if ($rowPatients > 0) {
    $patients = $patientsResult->fetch_array();
}

echo json_encode($patients, JSON_UNESCAPED_UNICODE);