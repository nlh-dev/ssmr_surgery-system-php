<?php

require '../config/dbConnection.php';
session_start();

if ($_POST) {

    $Username = $_POST['usuario'];
    $Password = $_POST['password'];

    $sqlLogin = "SELECT userID, userName, userPassword, userRoleID FROM users JOIN roles ON users.userRoleID = roles.rolesID WHERE userName = '$Username'";

    $Results = $dbConnection->query($sqlLogin);
    $numResults = $Results->num_rows;

    if ($numResults > 0) {
        $userRow_ = $Results->fetch_assoc();
        $bdPassword = $userRow_['userPassword'];

        $passConfirm = $Password;

        if ($bdPassword == $passConfirm) {

            $_SESSION['userID'] = $userRow_['userID'];
            $_SESSION['userName'] = $userRow_['userName'];
            $_SESSION['userRoleID'] = $userRow_['userRoleID'];
            $_SESSION['rolesID'] = $userRow_['rolesID'];

            if ($userRow_['userRoleID'] == 2) {
                header("Location: User_Index.php");
            } elseif ($userRow_['userRoleID'] == 3) {
                header("Location: SurgeryUser_Index.php");
            } else {
                header("Location: Index.php");
            }
        } else {
            $_SESSION['color'] = "warning";
            $_SESSION['msg'] = " Contraseña Incorrecta! Por favor, intente nuevamente";
            $_SESSION['icon'] = "fa-solid fa-circle-exclamation";
        }
    }else {
        $_SESSION['color'] = "danger";
        $_SESSION['msg'] = "Usuario No Encontrado!";
        $_SESSION['icon'] = "fa-solid fa-circle-xmark";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../app/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../app/assets/css/styles/index-styles.css">
    <title>Quirófano | Inicio de Sesión</title>
</head>

<body style="background-color: #212529;">
    <div class="form-signin w-100 m-auto">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container my-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="../../app/assets/images/SSMR_LOGO-2.png" alt="" width="150">
                                        </div>
                                        <h3 class="text-center font-weight-light my-4 text-secondary">Quirofano</h3>
                                        <h5 class="text-center font-weight-light my-4 text-secondary">Inicio de Sesión</h5>
                                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                                            <?php if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
                                                <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert"><i class="<?= $_SESSION['icon'] ?>"></i> <?= $_SESSION['msg']; ?>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php
                                                unset($_SESSION['color']);
                                                unset($_SESSION['msg']);
                                                unset($_SESSION['icon']);
                                            } ?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="usuario" name="usuario" type="text" placeholder="" required />
                                                <label class="text-secondary" for="inputUsuer"><i class="fa-solid fa-user"></i> Usuario:</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="" required />
                                                <label class="text-secondary" for="inputPassword"><i class="fa-solid fa-key"></i> Contraseña:</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" value="" id="inputShowPassword" name="inputShowPassword" onclick="showLoginPassword()">
                                                <label class="form-check-label" for="flexCheckDefault">Mostrar Contraseña</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <p class="small text-secondary">
                                            Copyright © <?php echo date(format: "Y") ?> | Sistema de Salud Madre Rafols <br> Departamento de Informática
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </main>
        </div>
    </div>

    <script src="../../app//assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/dbdf95c22b.js" crossorigin="anonymous"></script>
    <script>
        history.replaceState(null, null, location.pathname)
    </script>
</body>

</html>