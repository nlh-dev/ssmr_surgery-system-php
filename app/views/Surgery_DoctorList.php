<?php

require '../config/dbConnection.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../app/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../app/assets/css/styles/index-styles.css">
    <link rel="shortcut icon" href="../../app/assets/images/SSMR_LOGO-3.png" type="image/x-icon">
    <title>Quirófano | Lista de Médicos</title>
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
                <li>
                    <a href="Surgery_Index.php" class="nav-link text-white" aria-current="page">
                        <i class="sidebar-icons fa-solid fa-house"></i>Inicio
                    </a>
                </li>
                <li>
                    <a href="Surgery_DoctorList.php" class="nav-link active text-white">
                        <i class="sidebar-icons fa-solid fa-user-doctor"></i>Médicos
                    </a>
                </li>
                <li>
                    <a href="Surgery_SpecialitiesList.php" class="nav-link text-white">
                        <i class="sidebar-icons fa-solid fa-suitcase-medical"></i>Lista de Intervenciones
                    </a>
                </li>
                <hr>
            </ul>
            <hr>
            <a href="Logout.php" class="btn btn-primary">
                <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
            </a>
        </div>

        <div class="container p-4">
            <div class="mb-3">
                <h2><i class="sidebar-icons fa-solid fa-user-doctor mx-2"></i>Lista de Médicos</h2>
                <hr>
            </div>
            <!-- PHP IMPORTS -->
            <?php include './DoctorTable.php'?>
            <?php include './Surgery_AddMedsModal.php'?>
            <?php include './Surgery_EditMedsModal.php'?>
            <?php include './Surgery_DeleteMedsModal.php'?>
        </div>
    </div>

    <script>
        let editMedsModal = document.getElementById('editMedsModal')
        let deleteMedsModal =document.getElementById('deleteMedsModal')
        
        editMedsModal.addEventListener('shown.bs.modal', event =>{

            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputID = editMedsModal.querySelector('.modal-body #id');
            let inputMedName = editMedsModal.querySelector('.modal-body #medName');

            let url = "getMeds.php"
            let formData = new FormData()
            formData.append('medID', id)

            fetch(url,{
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                inputID.value = data.medID,
                inputMedName.value = data.medFullName
            }).catch(err => console.log(err))
        })

        
        deleteMedsModal.addEventListener('shown.bs.modal', event =>{
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            deleteMedsModal.querySelector('.modal-footer #id').value = id
            
        })
    </script>

    <script src="../../app//assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dbdf95c22b.js" crossorigin="anonymous"></script>
    <script>history.replaceState(null, null, location.pathname)</script>
</body>

</html>