<!-- Modal para Añadir Pacientes -->
<div class="modal fade" id="addPatientsModal" tabindex="-1" aria-labelledby="addPatientsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 s" id="addPatientsModal">Agregar Paciente</h1>
            </div>
            <div class="modal-body">
                <form action="SavePatients.php" method="POST">
                    <div class="mb-3">
                        <strong for="">Nombre del Paciente</strong>
                        <input type="text" name="patient" id="patient" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <strong for="" class="">Médico</strong>
                        <select name="doctors" id="doctors" class="form-select">
                            <option selected>-- SELECCIONE --</option>
                            <?php while ($row_doctors = $Doctors->fetch_assoc()) { ?>
                                <option value="<?php echo $row_doctors["medID"] ?>"><?php echo $row_doctors["medFullName"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <strong for="" class="">Cirugía</strong>
                        <select name="surgery" id="surgery" class="form-select">
                            <option selected>-- SELECCIONE --</option>
                            <?php while ($row_surgery = $Surgery->fetch_assoc()) { ?>
                                <option value="<?php echo $row_surgery["surgeryID"]?>"><?php echo $row_surgery["surgeryName"]?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <strong for="" class="">Estado</strong>
                        <select name="state" id="state" class="form-select">
                            <option selected>-- SELECCIONE --</option>
                            <?php while ($row_state = $PatientState->fetch_assoc()) { ?>
                                <option value="<?php echo $row_state["stateID"] ?>"><?php echo $row_state["stateName"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger mx-3" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>