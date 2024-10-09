<?php
require '../config/dbConnection.php';

$sqlSurgery = "SELECT * FROM surgery_type";
$Surgery = $dbConnection->query($sqlSurgery);
?>

<div class="table_container mt-3">
        <div class="d-flex justify-content-end align-items-center">
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSpecialityModal"><i class="sidebar-icons fa-solid fa-suitcase-medical"></i> Añadir Cirugía</button>
        </div>
    <table class="table table-striped table-hover mt-3">
        <thead class="table-dark text-center">
            <tr>
                <th>Tipo de Cirugía</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center text-uppercase">
            <?php while ($row_surgery = $Surgery->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <?= $row_surgery["surgeryName"] ?>
                    </td>
                    <td class="d-flex justify-content-evenly">
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editSpecialityModal" data-bs-id="<?= $row_surgery["surgeryID"] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>