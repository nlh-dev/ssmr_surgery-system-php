<?php 

require '../config/dbConnection.php';

    $savePatient = $dbConnection->real_escape_string($_POST['patient']);
    $saveDoctors = $dbConnection->real_escape_string($_POST['doctors']);
    $saveSurgery = $dbConnection->real_escape_string($_POST['surgery']);
    $saveState = $dbConnection->real_escape_string($_POST['state']);

    $sqlSavePatients = "INSERT INTO patients(patientsFullName, patientsMedID, patientsSurgeryTypeID, patientsStateID) 
                    VALUE ('$savePatient', $saveDoctors, $saveSurgery, $saveState)";

if ($dbConnection->query($sqlSavePatients)) {
    $id = $dbConnection->insert_id;
}

header ('Location: Index.php');