

            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Rutina : <?php echo $rutina[0]->nombre ?></h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=routine&method=">Rutinas</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=routine&method=exercisesRoutine&id=<?php echo $nombre ?>">Ejericicios por rutina</a></li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Listado de Ejercicios</h4>
                                        <div class="row ">
                                            <div class="col-md-3">
                                                <div class="dropdown mo-mb-2 mt-3">
                                                
                                                    <a class="btn btn-primary dropdown-toggle px-5" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ejercicios de rutina 
                                                    </a>
                                                    <div class="dropdown-menu px-5 mx-1" aria-labelledby="dropdownMenuLink">
                                                    <?php $count=1; foreach($exercises as $exercise):?>
                                                       <a href="?controller=routine&method=exercisesRoutineF&id=<?php echo $rutina[0]->rutina_id?>&ed=<?php echo $exercise->ejercicio_id?>""><li class="dropdown-item">  <?php echo $count; ?> <?php  echo ucwords($exercise->ejercicio) ?></li></a>
                                                    <?php $count++; endforeach?>                                                        
                                                    </div>
                                                </div>
                                            </div> <!-- end col-md-3 -->
                                            <div class="col-md-9">
                                                       
                                                <img src="images/nav/video.jpg" alt="Responsive image"  class="img-fluid rounded rounded-circle." >
                                            </div> <!-- end col-md-6 -->
                                            <!-- <div class="col-md-3">
                                                <ul class="list-group">
                                                        <li class=" text-center list-group-item list-group-item-secondary  no-gutters mb-0">Información</li>
                                                    <?php foreach ($exercises as $e):?>
                                                        <li class=" text-center list-group-item">Series: <?php echo $e->series?></li>
                                                        <li class=" text-center list-group-item">Repeticiones: <?php echo $e->repeticiones?></li>

                                                    <?php endforeach; ?>    
                                                </ul>
                                            </div> -->
                                        
                                        </div><!-- end row justify -->
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

