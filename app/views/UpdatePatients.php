<?php 

require '../config/dbConnection.php';

    $id = $dbConnection->real_escape_string($_POST['id']);
    $Patient = $dbConnection->real_escape_string($_POST['patient']);
    $Doctors = $dbConnection->real_escape_string($_POST['doctors']);
    $Surgery = $dbConnection->real_escape_string($_POST['surgery']);
    $State = $dbConnection->real_escape_string($_POST['state']);

    $sqlUpdatePatients = "UPDATE patients
    SET patientsFullName='$Patient', patientsMedID=$Doctors, patientsSurgeryTypeID=$Surgery, patientsStateID=$State
    WHERE patientsID = $id";

if ($dbConnection->query($sqlUpdatePatients)) {
}

header ('Location: Index.php');