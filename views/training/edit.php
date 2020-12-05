<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Edición de planes</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                            <li class="breadcrumb-item"><a href="?controller=training">Planes de entreno</a></li>
                            <li class="breadcrumb-item"><a href="?controller=training&method=new">Nuevo plan</a></li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="">
                <div class="">
                    <div class="card m-b-30">
                        <div class="card-body p-0">
                            <h4 class="mt-0 header-title m-3">Edición de planes</h4>
                            <div class="mb-5">
                                <div class="d-flex offset-md-7 pl-5 ">
                                    <a class=" btn btn-info  text-white " id="addElement"> <i class="fa fa-plus"></i>
                                        Rutina</a>
                                </div>
                                <!-- <form id="edit"> -->
                                    <div class="row mx-5">

                                        <div class="col-md-3">
                                            <input type="hidden"  value="<?php echo $plan[0]->plan_id ?>" id="plan">
                                            <label class="mt-2" for="nombre" data-parsley-required>Nombre</label>
                                            <input type="text" value="<?php echo $plan[0]->nombre ?> " id="nombre"
                                                placeholder="Nombre" class=" mt-1 form-control">
                                            <label class="mt-2" for="nombre">Peso inicial</label>
                                            <input type="text" data-parsley-required data-parsley-type="integer"
                                                value="<?php echo $plan[0]->peso_inicial ?>" id="peso_inicial"
                                                placeholder="peso inicial en kg" class=" mt-1 form-control">

                                            <label class="mt-2" for="nombre">Porcentaje incial</label>
                                            <input type="text" data-parsley-required
                                                value="<?php echo $plan[0]->porcentaje_inicial ?>" data-parsley-required
                                                data-parsley-type="integer" id="porcentaje_inicial"
                                                placeholder="porcentaje de grasa inicial" class=" mt-1 form-control">

                                        </div>

                                        <div class="col-md-3">
                                            <label class="mt-2" for="nombre" data-parsley-required>Cliente</label>
                                            <select name="objetivo" id="cliente" data-live-search="true" class=" mt-1 form-control border" data-parsley-required>
                                                <option value="">Seleccione...</option>

                                                <?php foreach ($users as $user): 
                                                if($user->usuario_id == $plan[0]->usuario_id){ ?>

                                                <option selected value="<?php echo $user->usuario_id ?>">
                                                    <?php echo $user->cedula.' '.$user->nombre.' '.$user->apellido ?>
                                                </option>

                                                <?php }else{ ?>

                                                <option value="<?php echo $user->usuario_id ?>">
                                                    <?php echo $user->cedula.' '.$user->nombre.' '.$user->apellido ?>
                                                </option>

                                                <?php } endforeach;?>
                                            </select>


                                            <label class="mt-2" for="nombre">Peso final</label>
                                            <input type="text" data-parsley-type="integer" value="<?php echo $plan[0]->peso_final ?>"
                                                id="peso_final" placeholder="Peso final en kg"
                                                class=" mt-1 form-control">

                                            <label class="mt-2" for="nombre">Porcentaje final</label>
                                            <input type="text" data-parsley-type="integer" value="<?php echo $plan[0]->porcentaje_final ?>"
                                                id="porcentaje_final" placeholder="porcentaje de grasa corporal"
                                                class=" mt-1 form-control">
                                        </div>

                                        <div class="col-md-3">

                                            <label class="mt-2" for="nombre">Rutinas</label>
                                            <select name="objetivo" id="routine" class="form-control 
                                             border" data-live-search="true" data-parsley-required>
                                                <option value="">Seleccione...</option>
                                                <?php foreach ($routines as $routine): ?>

                                                <option value="<?php echo $routine->rutina_id ?>">
                                                    <?php echo $routine->nombre?> </option>

                                                <?php endforeach;?>
                                            </select>
                                            <label class="mt-2" for="dia ">fecha</label>
                                       
                                       <input type="text" id="dia" class="form-control" placeholder="dd/mm/yy" data-parsley-required>
                                            <label class="mt-2" for="repeticiones"
                                                data-parsley-required>Objetivo</label>
                                            <select name="objetivo" class="form-control mt-1" id="objetivo">
                                                <option value="">Seleccione...</option>
                                                <option selected value="<?php echo  $plan[0]->objetivo ?>">
                                                    <?php echo  $plan[0]->objetivo ?></option>
                                                <option value="Bajar de peso">Bajar de peso</option>
                                                <option value="Hipertrofiar">Hipertrofiar</option>
                                                <option value="Mejorar condicion fisica">Mejorar condicion fisica
                                                </option>
                                                <option value="Otro">Otro.</option>

                                            </select>
                                            <div class="ml-5 pl-3">
                                                <button id="update"  class="ml-5 mt-5 text-white btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <label class="text-center">Plan</label>
                                            <table class=" table table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th>Rutinas</th>
                                                        <th>Día</th>
                                                        <th>Borrar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="list-Routines">
                                                </tbody>

                                            </table>

                                            <?php
                                                if(count($routinesPlan) > 0) {
                                                    $arrRoutinePlan = [];
                                                    foreach($routinesPlan as $routine) {
                                                        array_push($arrRoutinePlan, ['id' => $routine->rutina_id, "dia" => $routine->dia,"name" => $routine->rutina]);
                                                    } ?>
                                            <script>
                                            var arrRoutines = <?php echo json_encode($arrRoutinePlan); ?>
                                            </script>
                                            <?php } else{  ?>
                                            <script>
                                            var arrRoutines = []
                                            </script>
                                            <?php  }?>

                                        </div>
                                    </div>
                                    <!--row-->
                                <!-- </form> -->
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
<script src="assets/js/parsley.min.js"></script>
<script src="assets/js/es.js"></script>
<script src="assets/js/training.js"></script>