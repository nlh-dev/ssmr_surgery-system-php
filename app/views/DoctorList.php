<?php



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../app/assets/css/styles/index-styles.css">
    <title>QUIRÒFANO</title>
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
                    <a href="Index.php" class="nav-link text-white" aria-current="page">
                        <i class="sidebar-icons fa-solid fa-house"></i>Inicio
                    </a>
                </li>
                <li>
                    <a href="DoctorList.php" class="nav-link active text-white">
                        <i class="sidebar-icons fa-solid fa-user-doctor"></i>Médicos
                    </a>
                </li>
                <li>
                    <a href="SpecialitiesList.php" class="nav-link text-white">
                        <i class="sidebar-icons fa-solid fa-suitcase-medical"></i>Lista de Intervenciones
                    </a>
                </li>
            </ul>
            <hr>
            <button type="button" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</button>
        </div>

        <div class="container p-4">
            <div class="mb-3">
                <h2><i class="sidebar-icons fa-solid fa-user-doctor"></i> Lista de Médicos</h2>
                <hr>
            </div>
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientsModal"><i class="fa-solid fa-person-circle-plus"></i> Añadir Paciente</button>
            </div>
            <div class="table_container mt-3">
                <table class="table table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr class="text-uppercase">
                            <th>Paciente</th>
                            <th>Médico</th>
                            <th>Tipo de Cirugía</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                            <tr class="text-uppercase align-content-center">
                                <td>Hector Navarro</td>
                                <td>Juan Carlos Bozo</td>
                                <td>Cirugía Oncológica</td>
                                <td>En Reposo</td>
                                <td>
                                    <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php
    include './includes/modals/addPatientsModal.php'
    ?>

    <script src="../../app/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dbdf95c22b.js" crossorigin="anonymous"></script>
</body>

</html>