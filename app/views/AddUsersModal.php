<!-- Modal para Añadir Pacientes -->
<div class="modal fade" id="addUsersModal" tabindex="-1" aria-labelledby="addUsersModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5 text-white" id="addUsersModal">
                    <img src="../../app/assets/images/SSMR_LOGO-1.png" class="ssmrlogo" alt="ssmr-logo-1">
                    Agregar Usuario
                </h1>
            </div>
            <div class="modal-body">
                <form action="SaveUsers.php" method="POST">
                    <div class="mb-3">
                        <strong for="">Nombre de Usuario</strong>
                        <input type="text" name="user" id="user" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <strong for="">Contrasñea</strong>
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