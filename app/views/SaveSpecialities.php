<?php 

require '../config/dbConnection.php';

    $Specialities = $dbConnection->real_escape_string($_POST['speName']);

    $sqlSpecialities = "INSERT INTO surgery_type(surgeryName) VALUE ('$Specialities')";

if ($dbConnection->query($sqlSpecialities)) {
    $id = $dbConnection->insert_id;
}

header ('Location: SpecialitiesList.php');