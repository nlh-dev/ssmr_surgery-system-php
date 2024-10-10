<?php 

require '../config/dbConnection.php';

    $Patient = $dbConnection->real_escape_string($_POST['patient']);
    $Doctors = $dbConnection->real_escape_string($_POST['doctors']);
    $Surgery = $dbConnection->real_escape_string($_POST['surgery']);
    $State = $dbConnection->real_escape_string($_POST['state']);

    $sqlSavePatients = "INSERT INTO patients (patientsFullName, patientsMedID, patientsSurgeryTypeID, patientsStateID) 
    VALUE ('$Patient', $Doctors, $Surgery, $State)";

if ($dbConnection->query($sqlSavePatients)) {
    $id = $dbConnection->insert_id;
}

header ('Location: Surgery_Index.php');