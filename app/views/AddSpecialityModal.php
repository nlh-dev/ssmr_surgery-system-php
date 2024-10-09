<!-- Modal para Añadir Pacientes -->
<div class="modal fade" id="addSpecialityModal" tabindex="-1" aria-labelledby="addSpecialityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5 text-white" id="addSpecialityModal">
                    <img src="../../app/assets/images/SSMR_LOGO-1.png" class="ssmrlogo" alt="ssmr-logo-1">
                    Agregar Cirugía
                </h1>
            </div>
            <div class="modal-body">
                <form action="SaveSpecialities.php" method="POST">
                    <div class="mb-3">
                        <strong for="">Nombre de la Cirugía</strong>
                        <input type="text" name="speName" id="speName" class="form-control" required>
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