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
                <li class="">
                    <a href="Index.php" class="nav-link text-white">
                        <i class="sidebar-icons fa-solid fa-house"></i>Inicio
                    </a>
                </li>
                <li>
                    <a href="DoctorList.php" class="nav-link text-white">
                        <i class="sidebar-icons fa-solid fa-user-doctor"></i>Médicos
                    </a>
                </li>
                <li>
                    <a href="SpecialitiesList.php" class="nav-link active text-white">
                        <i class="sidebar-icons fa-solid fa-suitcase-medical"></i>Lista de Intervenciones
                    </a>
                </li>
            </ul>
            <hr>
            <button type="button" class="btn btn-primary"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</button>
        </div>

    </div>

    <script src="../../app/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dbdf95c22b.js" crossorigin="anonymous"></script>
</body>

</html>