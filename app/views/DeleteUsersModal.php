<!-- Modal para Añadir Pacientes -->
<div class="modal fade" id="deleteUsersModal" tabindex="-1" aria-labelledby="deleteUsersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5 text-white" id="deleteUsersModal">Aviso</h1>
            </div>
            <div class="modal-body text-center">
                <label>¿Desea Eliminar este Usuario?</label>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                    <form action="DeletePatients.php" method="POST">
                        <input type="hidden" id="id" name="id">
                            <button type="button" class="btn btn-danger mx-3" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancelar</button>
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                    </form>
            </div>
        </div>
    </div>
</div>