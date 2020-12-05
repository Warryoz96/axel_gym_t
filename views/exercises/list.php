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
                            <img src="assets/images/svg222/049-muscle.svg" class="img-fluid ml-1" width="30"
                                alt=""><span class="badge badge-success badge-pill float-right"></span> <span>
                                Ejercicios </span>
                        </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Ejercicios</a></li>
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
                                <button class="btn btn-primary " data-toggle="modal" data-target="#registerexercise"> <i
                                        class="fa fa-plus"></i> Ejercicio</button>
                                <a class="btn btn-info ml-1" href="?controller=muscle"><i class="fa fa-list"></i>
                                    Musculos</a>
                            </div>
                            <h4 class="mt-0 header-title">Listado de ejercicios</h4>
                            <!-- <p class="sub-title">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->

                            <table id="datatable"
                                class=" dataTables_wrapper container-fluid text-center table table-hover no-footer  dt-bootstrap4 dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Tipo</th>
                                        <th>Video</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  $count = 1; foreach($exercises as $exercise) :?>
                                    <tr>
                                        <td> <?php echo $count ?></td>
                                        <td><?php echo $exercise->nombre ?></td>
                                        <td value="2"><?php echo $exercise->tipo ?></td>
                                        <td> <a href="#video<?php echo $exercise->ejercicio_id ?>"
                                                data-toggle="modal"><i class=" btn  bg-primary btn-sm "> <i
                                                        class="fa fa-play  text-white"></i></i></a></td>
                                        <td> 
                                            <b class=" badge  <?php echo $estado= $exercise->estado == 'Activo'? ' badge-success ': 'badge-danger';  ?> "><?php echo $exercise->estado ?></b>
                                        </td>
                                        <td>

                                            <?php if($exercise->estado=="Activo"){?>
                                            <span class="d-inline-block bg-light" tabindex="0" data-toggle="tooltip"
                                                title="Ver musculos">
                                                <a class="btn btn-info" data-toggle="modal"
                                                    href="#muscles<?php echo $exercise->ejercicio_id ?>"><i
                                                        class="fa fa-list"></i></a>
                                            </span>

                                            <span class="d-inline-block bg-light" tabindex="0" data-toggle="tooltip"
                                                title="Editar">
                                                <a class="btn btn-warning btnEditar"
                                                    href="?controller=exercise&method=edit&id=<?php echo $exercise->ejercicio_id ?>"><i
                                                        class="fa fa-pen text-white btnEditar"
                                                        aria-hidden="true"></i></a>
                                            </span>
                                            <span class="d-inline-block bg-light " tabindex="0" data-toggle="tooltip"
                                                title="Inactivar">
                                                <a class="btn btn-danger delete"
                                                    href="?controller=exercise&method=updateStatus&id=<?php echo $exercise->ejercicio_id ?>"><i
                                                        class="fa fa-eye-slash"></i></a>
                                            </span>
                                            <?php }else{ ?>
                                            <span class="d-inline-block bg-dark" tabindex="0" data-toggle="tooltip"
                                                title="Activar ejercicio">
                                                <a href="?controller=exercise&method=updateStatus&id=<?php echo $exercise->ejercicio_id ?>"
                                                    class="btn btn-success active"><i class="fa fa-eye"></i></a>
                                            </span>
                                            <?php } ?>
                                        </td>
                                    </tr>


                                    <div class="modal fade" id="muscles<?php echo $exercise->ejercicio_id ?>"
                                        data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-scrollable modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header border-buttom border-primary text-dark">
                                                    <h3 class="modal-title  ">Músculos involucrados</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">

                                                    <?php foreach($Dmuscles as $dmuscle):  ?>

                                                    <?php  foreach($dmuscle as $Nmuscle):

                                                        if($Nmuscle->ejercicio_id == $exercise->ejercicio_id): ?>

                                                    <h5><?php echo $Nmuscle->nombre?></h5>

                                                    <?php endif; ?>

                                                    <?php endforeach;?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="video<?php echo $exercise->ejercicio_id ?>"
                                        data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header border-buttom border-primary text-dark">
                                                    <h4 class="modal-title text-center ">Ejercicio:
                                                        <?php echo $exercise->nombre ?></h4>
                                                    <button id="cerrar" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body ">



                                                    <?php  
                                                        if(isset($exercise->ejercicio_id)): ?>

                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <video id="Mivideo" class="embed-responsive-item"
                                                            src="videos/<?php echo $exercise->video?>" controls></video>
                                                    </div>

                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                   
                                    <?php  $count++;  endforeach; ?>

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
        © 2019 - 2020 Axel Gym <span class="d-none d-sm-inline-block"> - Todos los derechos reservados. </span>
    </footer>

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

</div>
        <script src="assets/js/parsley.min.js" ></script>
        <script src="assets/js/es.js" ></script>
        <script src="assets/js/exercise.js"></script>




<!-- END wrapper -->