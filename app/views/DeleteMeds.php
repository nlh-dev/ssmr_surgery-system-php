<?php 

require '../config/dbConnection.php';

    $id = $dbConnection->real_escape_string($_POST['id']);

    $sqlMeds = "DELETE FROM doctors WHERE medID = $id";

if ($dbConnection->query($sqlMeds)) {
}

header ('Location: DoctorList.php');