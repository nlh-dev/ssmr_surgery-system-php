<?php
require '../config/dbConnection.php';

$sqlUsers = "SELECT * FROM users
JOIN roles ON users.userRoleID = roles.rolesID";
$Users = $dbConnection->query($sqlUsers);
?>

<div class="table_container mt-3">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUsersModal"><i class="fa-solid fa-user-plus"></i> Añadir Usuario</button>
        </div>
    <table class="table table-striped table-hover mt-3">
        <thead class="table-dark text-center">
            <tr>
                <th>Nombre de Usuario</th>
                <th>Contraseña</th>
                <th>Rol de Usuario</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php while ($row_users = $Users->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <?= $row_users["userName"] ?>
                    </td>
                    <td>
                        <?= $row_users["userPassword"] ?>
                    </td>
                    <td>
                        <?= $row_users["rolesName"] ?>
                    </td>
                    <td class="d-flex justify-content-evenly">
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUsersModal" data-bs-id="<?= $row_users["userID"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUsersModal" data-bs-id="<?= $row_users["userID"] ?>"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>