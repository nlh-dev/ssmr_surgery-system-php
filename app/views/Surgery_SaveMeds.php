<?php 

require '../config/dbConnection.php';

    $Meds = $dbConnection->real_escape_string($_POST['medName']);

    $sqlMeds = "INSERT INTO doctors(medFullName) VALUE ('$Meds')";

if ($dbConnection->query($sqlMeds)) {
    $id = $dbConnection->insert_id;
}

header ('Location: Surgery_DoctorList.php');