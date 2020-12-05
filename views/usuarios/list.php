            </main><!-- Main Container-->

            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">
                                        <img src="assets/images/svg222/hombre.svg" class="img-fluid ml-1 " width="27"
                                            alt=""><span class="badge badge-success badge-pill float-right"></span>
                                        <span> Usuarios </span>
                                    </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Usuarios</a></li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <div class=" d-flex justify-content-end col-md-12 mb-1">
                                            <button class="btn bg-primary text-white" data-toggle="modal"
                                                data-target="#registerUser"><i class="fa fa-plus"></i> Usuarios</button>
                                        </div>
                                        <h4 class="mt-0 header-title">Listado de usuarios</h4>
                                        <!-- <p class="sub-title">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->

                                        <table id="datatable"
                                            class=" text-center table table-hover dt-responsive nowrap"
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Cédula</th>
                                                    <th>Correo</th>
                                                    <th>Teléfono</th>
                                                    <th>Rol</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($users as $user) :?>
                                                <tr>
                                                    <td id="id"><?php echo $user->usuario_id ?></td>
                                                    <td><?php echo $user->nombre ?></td>
                                                    <td><?php echo $user->apellido ?></td>
                                                    <td><?php echo $user->cedula ?></td>
                                                    <td><?php echo $user->correo ?></td>
                                                    <td><?php echo $user->telefono ?></td>
                                                    <td><?php echo $user->rol ?></td>
                                                    <td> <b
                                                            class=" badge  <?php echo $estado= $user->estado == 'Activo'? ' badge-success ': 'badge-danger';  ?> "><?php echo $user->estado ?></b>
                                                    </td>
                                                    <td>

                                                        <?php  if($user->rol=="Cliente" && $user->estado=="Activo") {?>

                                                        <a class="btn btn-info ue  "
                                                            href="?controller=plan&id=<?php echo $user->usuario_id?>"><i
                                                                class="fa fa-list-alt text-white"></i></a>
                                                        <a class="btn btn-danger ue delete  "
                                                            href="?controller=user&method=updateStatus&id=<?php echo $user->usuario_id ?>"><i
                                                                class="fa fa-eye-slash text-white "></i></a>

                                                        <?php }elseif($user->rol!="Cliente" && $user->estado=="Activo"){?>

                                                        <button class="btn btn-warning btnEditar" value="<?php echo $user->usuario_id; ?>" data-toggle="modal"
                                                        data-target="#EditUser"><i class="fas fa-pencil-alt text-white btnEditar"  aria-hidden="true"></i></button>
                                                        <a class="btn btn-danger ue delete"  href="?controller=user&method=updateStatus&id=<?php echo $user->usuario_id ?>"><i
                                                                class="fa fa-eye-slash  text-white active"></i></a>
                                                        <?php }else{?>

                                                        <a href="?controller=user&method=updateStatus&id=<?php echo $user->usuario_id ?>"
                                                            class="btn btn-info active"><i
                                                                class="fa fa-eye text-white"></i></a>

                                                        <?php } ?>
                                                    </td>
                                                </tr>


                                                <!--editar usuario-->


                                                <?php endforeach ?>
                                            </tbody>

                                        </table>

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
            <script src="assets/js/user.js"></script>
