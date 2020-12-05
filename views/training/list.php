
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
                                    <img src="assets/images/svg222/043-personal.svg" class="img-fluid ml-1" width="30" alt=""><span class="badge badge-success badge-pill float-right"></span> <span> Planes de entreno </span>
                                    </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=training">Planes de entreno</a></li>
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
                                       <?php $new = $_SESSION['rol'] === 'Cliente' ? '' :  '<a href="?controller=training&method=new" class="btn bg-primary text-white  inline-block" ><i class="fa fa-plus"></i> Plan</a>';  echo $new;        ?>  
                                        </div>      
                                            <h4 class="mt-0 header-title">Listado de Planes de entrenamiento</h4>
                                        <div class="row   mb-5 dt-responsive nowrap">
                                            <?php   foreach ($plans as $plan):?> 
                                                <div class="col-md-4 mb-3">
                                                
                                                        <ul class="list-group">
                                                            <li class="list-group-item text-white header-plan"><h3 class="mt-0 header-title headerPlan"><?php echo $plan->nombre ?></h3></li>
                                                            <li class="list-group-item"> Objetivo: <b><?php  echo $plan->objetivo ?></b> </li>
                                                            <li class="list-group-item">Cliente:  <b><?php  echo $plan->usuario?></b></li>
                                                            <li class="list-group-item">Peso inicial:  <?php  echo $plan->peso_inicial?>   Peso final:  <b><?php  echo $plan->peso_final ?></b></li>
                                                            <li class="list-group-item">Porcentaje inicial:  <b> <?php  echo $plan->porcentaje_inicial ?>  Porcentaje final: </b> <b><?php  echo $plan->porcentaje_final ?> </b></li>
                                                            <li class="list-group-item">Acciones:
                                                            <?php if($_SESSION['rol'] === 'Cliente'){  ?>
                                                                <b>  <a class="ml-1 btn btn-info" href="?controller=training&method=play&id=<?php echo $plan->plan_id ?>"> <i class="fa fa-play"></i></a></b></li>
                                                                                                                                                                                                                        </li>
                                                            <?php }else{  ?>
                                                                <a class="ml-1 btn header-plan text-white" href="?controller=training&method=play&id=<?php echo $plan->plan_id ?>"> <i class="icon-todolist"></i> Ver rutinas</a>
                                                                <a class="ml-1 btn btn-warning" href="?controller=training&method=edit&id=<?php echo $plan->plan_id ?>"> <i class="fa fa-pen"></i></a></li>
                                                            <?php     }    ?>   
                                                        </ul>
                                                    
                                                </div> <!--end col-md-4 -->
                                            <?php endforeach; ?>      
                                        </div>
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
