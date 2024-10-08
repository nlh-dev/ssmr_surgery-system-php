<!--SQL CONECTION AND INJECTION-->

<?php

require '../config/dbConnection.php';

$sqlDoctors = "SELECT * FROM doctors";
$Doctors = $dbConnection->query($sqlDoctors);

$sqlPatientState = "SELECT * FROM patient_states";
$PatientState = $dbConnection->query($sqlPatientState);

$sqlSurgery = "SELECT * FROM surgery_type";
$Surgery = $dbConnection->query($sqlSurgery);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../app/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../app/assets/css/styles/index-styles.css">
    <title>QUIRÓFANO</title>
</head>

<body>
    <div class="d-flex">
        <!-- SIDEBAR -->
        <?php include './includes/Sidebar.php'?>
    </div>

        <!-- PHP IMPORTS -->
        <?php include './PatientsTable.php'; ?>
        <?php include './AddPatientsModal.php'; ?>

    </div>


    <script src="../../app//assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dbdf95c22b.js" crossorigin="anonymous"></script>
    <script>
        history.replaceState(null, null, location.pathname)
    </script>
</body>

</html>