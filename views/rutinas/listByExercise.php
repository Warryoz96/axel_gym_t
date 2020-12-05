

            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Rutina: <?php echo $exercises[0]->nombre ?> <br></h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=routine">Rutinas</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=routine&method=exercisesRoutine&id=<?php $rutina; ?>">Ejericicios por rutina</a></li>
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
                                                <div class="dropdown mo-mb-2">
                                                    <a class="btn btn-primary dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       rutina:  <?php echo $exercises[0]->nombre ?> 
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <?php  foreach($exercise as $exercise):?>
                                                        <a href="?controller=routine&method=exercisesRoutineF&id=<?php echo $rutina[0]->rutina_id?>&ed=<?php echo $exercise->ejercicio_id?>""><li class="dropdown-item">    <?php  echo ucwords($exercise->ejercicio) ?></li></a>
                                                    <?php endforeach?> 
                                                    </div>                                                       
                                                </div>
                                            </div> <!-- end col-md-3 -->
                                            <div class="col-md-6">
                                                <h5>Ejercicio:   <?php echo  $exercises[0]->repeticiones."x".$exercises[0]->series.$exercises[0]->ejercicio ?> </h5>

                                            <div class="embed-responsive embed-responsive-16by9">
                                                <video  class="embed-responsive-item" src="videos/<?php echo $exercises[0]->video?>" controls></video>
                                                </div>

                                            </div> <!-- end col-md-6 -->
                                            <div class="col-md-3">
                                                <ul class="list-group">
                                                        <li class="  mt-sm-4 list-group-item header-plan text-white no-gutters mb-0">Información</li>
                                                        <li class="list-group-item"> <b>Series:</b> <?php echo $exercises[0]->series?></li>
                                                        <li class="list-group-item"> <b>Repeticiones:</b> <?php echo $exercises[0]->repeticiones?></li>
                                                        <li class="list-group-item"> <b>Musculos Involucrados:</b> 
                                                        <?php foreach($muscles as $m): ?>
                                                          <br>   <?php  echo'* '.$m->nombre ?>
                                                        <?php  endforeach; ?>
                                                        
                                                        </li>
                                                     
                                                </ul>
                                            </div>
                                        
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

