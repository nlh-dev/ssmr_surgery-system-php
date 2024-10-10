<!-- Modal para Añadir Pacientes -->
<div class="modal fade" id="editUsersModal" tabindex="-1" aria-labelledby="editUsersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5 text-white" id="editUsersModal">
                    <img src="../../app/assets/images/SSMR_LOGO-1.png" class="ssmrlogo" alt="ssmr-logo-1">
                    Editar Usuario
                </h1>
            </div>
            <div class="modal-body">
                <form action="UpdateUsers.php" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <strong for="">Nombre de Usuario</strong>
                        <input type="text" name="user" id="user" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <strong for="">Contraseña</strong>
                        <input type="text" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <strong for="" class="">Rol de Usuario</strong>
                        <select name="userRole" id="userRole" class="form-select">
                            <option selected>-- SELECCIONE --</option>
                            <?php while ($row_roles = $Roles->fetch_assoc()) { ?>
                                <option value="<?php echo $row_roles["rolesID"] ?>"><?php echo $row_roles["rolesName"] ?></option>
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