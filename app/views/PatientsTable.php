<?php

require '../config/dbConnection.php';

$sqlPatientsTable = "SELECT * FROM patients 
JOIN doctors ON patients.patientsMedID = doctors.medID
JOIN surgery_type ON patients.patientsSurgeryTypeID = surgery_type.surgeryID
JOIN patient_states ON patients.patientsStateID = patient_states.stateID";

$PatietnsTable = $dbConnection->query($sqlPatientsTable);

?>

<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPatientsModal"><i class="fa-solid fa-person-circle-plus"></i> Añadir Paciente</button>
</div>
<div class="table_container mt-3">
    <table class="table table-striped table-hover">
        <thead class="table-dark text-center">
            <tr>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Tipo de Cirugía</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center text-uppercase">
            <?php while ($row_patients = $PatietnsTable->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <?= $row_patients["patientsFullName"] ?>
                    </td>
                    <td>
                        <?= $row_patients["medFullName"] ?>
                    </td>
                    <td>
                        <?= $row_patients["surgeryName"] ?>
                    </td>
                    <td>
                        <?= $row_patients["stateName"] ?>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPatientsModal" data-bs-id="<?= $row_patients['patientsID']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    
</div>