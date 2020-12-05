            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                            <?php  if(isset($className)):?>
                                <div class="col-sm-6">
                                     
                                    <h4 class="page-title">Clase de <?php echo $className?></h4>
                                </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-right">
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                            <li class="breadcrumb-item"><a href="?controller=clase">Clases</a></li>
                                            <li class="breadcrumb-item"><a href="?controller=schedule&id=<?php echo $clase_id; ?>">Horario <?php echo $className?></a></li>
                                        </ol>
                                    </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Listado de horarios</h4>

                                     
                                        <table  id="datatable" class=" text-center table table-hover  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="">
                                                <tr>
                                                    <th>#</th>  
                                                    <th>Día</th>
                                                    <th>Hora inicial</th>
                                                    <th>Hora final</th>
                                                    <th>Instructor</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  foreach($schedules as $schedule) :?>
                                                    <tr>
                                                    
                                                        <td scope="row"> <?php  echo $schedule->hora_id?> </td>
                                                    <td scope="col-md-5"><?php  echo $schedule->dia?></td>
                                                        <td scope="col-md-5"><?php  echo $schedule->hora_inicio?></td>
                                                        <td scope="col-md-5"><?php  echo $schedule->hora_final?></td>
                                                        <td value="">Yo</td>
                                                        <td class="d-none"> <?php  echo $clase_id?></td>
                                                        
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
                <?php else: ?>
                            <img src="images/clases/NoShedule.jpg" alt="no hay horarios en esta clase" class="w-75 rounded mx-auto d-block img-fluid">
                <?php endif;?>

               
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

         
        </div>
        <!-- END wrapper -->                                                
     