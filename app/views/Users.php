<!--SQL CONECTION AND INJECTION-->
<?php

require '../config/dbConnection.php';
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: Login.php");
}

$sqlUsers = "SELECT * FROM users";
$Users = $dbConnection->query($sqlUsers);

$slqRoles = "SELECT * FROM roles";
$Roles = $dbConnection->query($slqRoles);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../app/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../app/assets/css/styles/index-styles.css">
    <link rel="shortcut icon" href="../../app/assets/images/SSMR_LOGO-3.png" type="image/x-icon">
    <title>Quirófano | Usuarios</title>
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
                <a href="Users.php" class="nav-link active text-white">
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
                <h2><i class="sidebar-icons fa-solid fa-users mx-2"></i> Lista de Usuarios</h2>
                <hr>
            </div>
            <!-- PHP USERS TABLE IMPORT -->
            <?php include './UsersTable.php' ?>
        </div>

    </div>
    <!-- PHP IMPORTS -->
    <?php include './AddUsersModal.php'; ?>
    <?php $Roles->data_seek(0); ?>
    <?php include './EditUsersModal.php'; ?>
    <?php include './DeleteUsersModal.php'; ?>

    <script>
        let editUsersModal = document.getElementById('editUsersModal')
        let deleteUsersModal = document.getElementById('deleteUsersModal')

        editUsersModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            let inputID = editUsersModal.querySelector('.modal-body #id')
            let inputUser = editUsersModal.querySelector('.modal-body #user')
            let inputPassword = editUsersModal.querySelector('.modal-body #password')
            let inputRole = editUsersModal.querySelector('.modal-body #userRole')

            let url = "getUsers.php"
            let formData = new FormData()
            formData.append('userID', id)

            fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                .then(data => {
                    inputID.value = data.userID
                    inputUser.value = data.userName
                    inputPassword.value = data.userPassword
                    inputRole.value = data.userRoleID
                }).catch(err => console.log(err))


        })
        deleteUsersModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id = button.getAttribute('data-bs-id')

            deleteUsersModal.querySelector('.modal-footer #id').value = id
        })
    </script>

    <script src="../../app//assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dbdf95c22b.js" crossorigin="anonymous"></script>
    <script>
        history.replaceState(null, null, location.pathname)
    </script>
</body>

</html>