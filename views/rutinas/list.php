


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
                                    <img src="assets/images/svg222/024-checklist.svg" class="img-fluid ml-1" width="30" alt=""><span class="badge badge-success badge-pill float-right"></span> <span>    Rutinas </span>
                                    </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=routine">Rutinas</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=routine">Rutinas</a></li>
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
                                    <button class="btn bg-primary text-white  inline-block" data-toggle="modal" data-target="#registerRoutine"><i class="fa fa-plus"></i> Registrar</button>          
                                    </div>      
                                        <h4 class="mt-0 header-title">Listado de Rutinas</h4>
                                        <!-- <p class="sub-title">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->
                                     
                                        <table  id="datatable" class=" text-center table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre rutina</th>
                                                    <th>Acciones</th>        
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($routines as $routine) :?>
                                                <tr>
                                                    <td><?php echo $routine->rutina_id ?></td>
                                                    <td><?php echo $routine->nombre ?></td>

                                                    <td>
                                                        <a class="btn btn-info" href="?controller=routine&method=exercisesRoutine&id=<?php echo $routine->rutina_id?>" ><i class="fa fa-play text-white"></i> Ver ejercicios</a>
                                                        <a class="btn btn-warning btnEditar"  href="?controller=routine&method=edit&id=<?php echo $routine->rutina_id?>"><i class="fa fa-pen text-white btnEditar" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
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
<script src="assets/js/routine.js"></script>


