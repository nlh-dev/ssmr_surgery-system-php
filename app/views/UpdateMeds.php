<?php 

require '../config/dbConnection.php';

    $id = $dbConnection->real_escape_string($_POST['id']);
    $Meds = $dbConnection->real_escape_string($_POST['medName']);

    $sqlMeds = "UPDATE doctors
    SET medFullName = '$Meds'
    WHERE medID = $id";

if ($dbConnection->query($sqlMeds)) {
}

header ('Location: DoctorList.php');