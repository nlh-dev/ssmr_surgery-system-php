<?php 

require '../config/dbConnection.php';

    $id = $dbConnection->real_escape_string($_POST['id']);

    $sqlPatients = "DELETE FROM patients WHERE patientsID = $id";

if ($dbConnection->query($sqlPatients)) {
}

header ('Location: Surgery_Index.php');