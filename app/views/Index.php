<!--SQL CONECTION AND INJECTION-->
<?php

require '../config/dbConnection.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: Login.php");
}


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
    <title>Quirófano | Lista de Pacientes</title>
</head>

<body>
    <div class="d-flex">
        <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
            <div class="op-room_container">
                <a href="#" class="text-white text-decoration-none">
                    <img src="../../app/assets/images/SSMR_LOGO-1.png" class="ssmrlogo" alt="ssmr-logo-1">
                    <span class="fs-4">QUIRÓFANO</span>
                </a>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="">
                    <a href="Index.php" class="nav-link active" aria-current="page">
                        <i class="sidebar-icons fa-solid fa-house"></i>Inicio
                    </a>
                </li>
                <li>
                    <a href="DoctorList.php" class="nav-link text-white">
                        <i class="sidebar-icons fa-solid fa-user-doctor"></i>Médicos
                    </a>
                </li>
                <li>
                    <a href="SpecialitiesList.php" class="nav-link text-white">
                        <i class="sidebar-icons fa-solid fa-suitcase-medical"></i>Lista de Intervenciones
                    </a>
                </li>
                <hr>
                <a href="Users.php" class="nav-link text-white">
                    <i class="fa-solid fa-users"></i> Usuarios
                </a>
            </ul>
            <hr>
            <a href="Logout.php" class="btn btn-primary">
                <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
            </a>
        </div>

        <div class="container p-4">
            <div class="mb-3">
                <h2><i class="fa-solid fa-hospital-user mx-2"></i>Lista de Pacientes</h2>
                <hr>
            </div>
        
            <!-- PHP PATIENTS TABLE IMPORT -->
            <?php include './PatientsTable.php'; ?>
        
        </div>
        <!-- PHP MODAL ACTIONS -->
        <?php include './AddPatientsModal.php'; ?>
        <?php 
            $Doctors->data_seek(0);
            $PatientState->data_seek(0); 
            $Surgery->data_seek(0);
        ?>
        <?php include './EditPatientsModal.php'; ?>
        <?php include './DeletePatientsModal.php'; ?>
    </div>

    <script>
        let AddPatientsModal =document.getElementById('addPatientsModal')
        let editPatientsModal = document.getElementById('editPatientsModal')
        let deletePatientsModal =document.getElementById('deletePatientsModal')

        AddPatientsModal.addEventListener('hide.bs.modal', event => {
            
            let inputPatient = AddPatientsModal.querySelector('.modal-body #patient').value = ""

        })
        
        editPatientsModal.addEventListener('hide.bs.modal', event => {
            
            let inputPatient = editPatientsModal.querySelector('.modal-body #patient').value = ""
            let inputDoctor = editPatientsModal.querySelector('.modal-body #doctors').value = ""
            let inputSurgery = editPatientsModal.querySelector('.modal-body #surgery').value = ""
            let inputState = editPatientsModal.querySelector('.modal-body #state').value = ""

        })

        

        editPatientsModal.addEventListener('shown.bs.modal', event => {

            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputID = editPatientsModal.querySelector('.modal-body #id');
            let inputPatient = editPatientsModal.querySelector('.modal-body #patient')
            let inputDoctor = editPatientsModal.querySelector('.modal-body #doctors')
            let inputSurgery = editPatientsModal.querySelector('.modal-body #surgery')
            let inputState = editPatientsModal.querySelector('.modal-body #state')

            let url = "getPatients.php"
            let formData = new FormData()
            formData.append('patientsID', id)

            fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                .then(data => {
                    inputID.value = data.patientsID
                    inputPatient.value = data.patientsFullName
                    inputDoctor.value = data.patientsMedID
                    inputSurgery.value = data.patientsSurgeryTypeID
                    inputState.value = data.patientsStateID
                }).catch(err => console.log(err))
        })

        deletePatientsModal.addEventListener('shown.bs.modal', event =>{
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            deletePatientsModal.querySelector('.modal-footer #id').value = id
        })

        
    </script>

    <script src="../../app//assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dbdf95c22b.js" crossorigin="anonymous"></script>
    <script>history.replaceState(null, null, location.pathname)</script>
</body>

</html>