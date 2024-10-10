<?php 

require '../config/dbConnection.php';

    $id = $dbConnection->real_escape_string($_POST['id']);
    $Specialities = $dbConnection->real_escape_string($_POST['speName']);

    $sqlSpecialities = "UPDATE surgery_type
    SET surgeryName = '$Specialities'
    WHERE surgeryID = $id";

if ($dbConnection->query($sqlSpecialities)) {
}

header ('Location: Surgery_SpecialitiesList.php');