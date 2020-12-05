<!--REGISTER USER MODAL -->
<div class="modal fade" id="registerUser" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header text-primary  border-bottom border-primary">
                <h4 class="modal-title">Registro de usuarios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="container">

                    <form action="?controller=user&method=save"  data-parsley-validate data-parsley-required required method="POST" id="new">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="#">Nombre<i class="text-danger">*</i></label>
                                <input type="text" name="nombre" data-parsley-required minlength="4" maxlength="20"
                                    data-parsley-length="[4, 20]"
                                    data-parsley-pattern="/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g"
                                    required class="form-control">
                            </div>
                            <div class=" col-md-6  form-group">
                                <label for="nombre">Apellido<i class="text-danger">*</i></label>
                                <input type="text" name="apellido" data-parsley-required minlength="4" maxlength="20"
                                    data-parsley-length="[3, 20]"
                                    data-parsley-pattern="/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g"
                                    required class="form-control">
                            </div>
                            <div class=" col-md-6  form-group">
                                <label for="nombre">Cédula<i class="text-danger">*</i></label>
                                <input type="text" name="cedula" id="newcedula" data-parsley-checkcedula  data-parsley-required data-parsley-type="integer"
                                    required class="form-control">
                            </div>
                            <div class=" col-md-6  form-group">
                                <label for="nombre">Correo<i class="text-danger">*</i></label>
                                <input type="email" name="correo"  id="email" data-parsley-checkemail data-parsley-checkemail-message="El correo ya esta en uso" data-parsley-trigger="focusout" data-parsley-required data-parsley-type="email"
                                    required class="form-control">
                            </div>
                            <div class=" col-md-6  form-group">
                                <label for="nombre">Télefono<i class="text-danger">*</i></label>
                                <input type="text" minlength="10" min="10" data-parsley-maxlength="10"
                                    data-parsley-minlength="10" data-parsley-type="integer" data-parsley-required
                                    required name="telefono" class="form-control">
                            </div>
                            <div class=" col-md-6">
                                <label for="nombre">Rol<i class="text-danger">*</i></label>
                                <select class="custom-select r" data-parsley-required required name="rol" id="rol">

                                    <option class="inputSelect" value="">Seleccionar...</option>
                                    <?php
                                        foreach ($roles as $role) {
                                            ?>
                                    <option value="<?php echo $role->rol_id?>"><?php echo $role->nombre?></option>
                                    <?php                                       
                                        }
                                    ?>
                                </select>
                                
                            </div>
                        </div>
                        <div class="row" id="plan">
                            <div id="result"></div>
                        </div>
                </div>
                <!--Container-->
                <div class="modal-footer">
                    <button class="btn btn-primary ton text-white order-1">Registrar</button>
                    </form>
                    <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
