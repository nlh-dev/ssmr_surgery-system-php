<?php
require '../config/dbConnection.php';

$sqlDoctors = "SELECT * FROM doctors";
$Doctors = $dbConnection->query($sqlDoctors);
?>

<div class="table_container mt-3">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMedsModal"><i class="fa-solid fa-address-book"></i> Añadir Médico</button>
        </div>
    <table class="table table-striped table-hover mt-3">
        <thead class="table-dark text-center">
            <tr>
                <th>Nombre del Médico</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center text-uppercase">
            <?php while ($row_doctors = $Doctors->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <?= $row_doctors["medFullName"] ?>
                    </td>
                    <td class="d-flex justify-content-evenly">
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editMedsModal" data-bs-id="<?= $row_doctors["medID"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMedsModal" data-bs-id="<?= $row_doctors["medID"] ?>"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>