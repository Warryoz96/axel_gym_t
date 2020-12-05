


            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Plan <?php   echo  $name ?></h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=training">Planes de entreno</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=routine">Rutina <?php echo  $name ?></a></li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Listado de Rutinas del plan <?php  echo $name ?></h4>
                                     
                                        <table  id="datatable" class=" text-center table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre rutina</th>
                                                    <th>Día</th>
                                                    <th>Acciones</th>        
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($routines as $routine) :?>
                                                <tr>
                                                    <td><?php echo $routine->rutina_id ?></td>
                                                    <td><?php echo $routine->rutina ?></td>
                                                    <td><?php echo $routine->dia ?></td>


                                                    <td>
                                                        <a class="btn btn-info" href="?controller=routine&method=exercisesRoutine&id=<?php echo $routine->rutina_id?>" ><i class="fa fa-play text-white"></i> Ver ejercicios</a>
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
        <script src="assets/js/routine.js"></script>
