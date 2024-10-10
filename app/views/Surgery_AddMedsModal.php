<!-- Modal para Añadir Pacientes -->
<div class="modal fade" id="addMedsModal" tabindex="-1" aria-labelledby="addMedsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5 text-white" id="addMedsModal">
                    <img src="../../app/assets/images/SSMR_LOGO-1.png" class="ssmrlogo" alt="ssmr-logo-1">
                    Agregar Médico
                </h1>
            </div>
            <div class="modal-body">
                <form action="Surgery_SaveMeds.php" method="POST">
                    <div class="mb-3">
                        <strong for="">Nombre del Médico</strong>
                        <input type="text" name="medName" id="medName" class="form-control" required>
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