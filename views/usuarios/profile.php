            <!-- Start right Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title text-center">Mi perfil</h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=user&method=profile">Mi perfil</a></li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <!--REGISTER muscle modal -->
                        <div class="modal fade" id="changePassword" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-buttom border-primary text-dark">
                                        <h4 class="modal-title">Actualización de contraseña</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="container">

                                            <!-- <form action="#" method="#" id="edit"> -->
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Contraseña actual</label>
                                                        <input type="password" name="claveO" autocomplete="off" id="claveO"
                                                            data-parsley-checkpassword
                                                            data-parsley-checkpassword-message="La contraseña no es correcta"
                                                            class="form-control"
                                                            placeholder="Ingrese su contraseña actual" required
                                                            data-parsley-required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Contraseña nueva</label>
                                                        <input type="password" name="clave" id="clave"
                                                            class="form-control" 
                                                            placeholder="Ingrese su contraseña nueva" required
                                                            data-parsley-required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Confirmar Contraseña Nueva</label>
                                                        <input type="password" name="clave2"  data-parsley-equalto="#clave" id="clave2"
                                                            class="form-control"
                                                            placeholder="Ingrese la confirmacion de la contraseña"
                                                            required data-parsley-required>
                                                    </div>
                                                </div>
                                        </div>
                                        <!--Container-->
                                        <div class="modal-footer">
                                            <button  class="btn btn-primary  ton text-white order-1 change">Cambiar</button>
                                            <!-- </form> -->
                                            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class=" offset-md-2 col-md-7 offset-md-2   ">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title"> <?php  ?></h4>
                                        <ul class=" list-group">
                                            <?php foreach($users as $user) : ?>
                                            <li class="list-group-item  list-group-item-dark">
                                                <h3 class="mt-0 header-title">Mis Datos:</h3>
                                            </li>
                                            <li class="list-group-item ">Nombre:
                                                <strong><?php  echo $user->nombre?></strong>
                                            </li>
                                            <li class="list-group-item"> Identificacion:
                                                <b><?php  echo $user->cedula?></b>
                                            </li>
                                            <li class="list-group-item">Correo: <b><?php  echo $user->correo?></b></li>
                                            <li class="list-group-item">Telefono: <?php  echo $user->telefono?></li>
                                            <li class="list-group-item ">Rol: <b><?php  echo $user->rol?></b></li>
                                            <li class="list-group-item">Estado de la cuenta: <b
                                                    class=" badge badge-success"> <?php  echo $user->estado?></b></li>
                                            <li class="list-group-item">Contraseña: <button data-toggle="modal"
                                                    data-target="#changePassword"
                                                    class="btn bg btn-sm text-white">Cambiar
                                                    Contraseña</button></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->




                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->
                <footer class="footer">
                    © 2019 - 2020 Axel Gym <span class="d-none d-sm-inline-block"> - Todos los derechos reservados.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            </div>
            <!-- END wrapper -->

            <script src="plugins/parsleyjs/parsley.min.js"></script>
            <script src="assets/js/es.js"></script>
            <script src="assets/js/profile.js"></script>