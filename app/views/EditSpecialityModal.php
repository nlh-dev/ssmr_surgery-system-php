<!-- Modal para Añadir Pacientes -->
<div class="modal fade" id="editSpecialityModal" tabindex="-1" aria-labelledby="editSpecialityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5 text-white" id="editSpecialityModal">
                    <img src="../../app/assets/images/SSMR_LOGO-1.png" class="ssmrlogo" alt="ssmr-logo-1">
                    Editar Cirugía
                </h1>
            </div>
            <div class="modal-body">
                <form action="UpdateSpecialities.php" method="POST">
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <strong for="">Nombre de la Cirugía</strong>
                        <input type="text" name="speName" id="speName" class="form-control" required>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger mx-3" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-floppy-disk"></i> Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>