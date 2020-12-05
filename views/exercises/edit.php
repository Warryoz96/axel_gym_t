<!--modal register exercise-->


<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Edicion de Ejercicios</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                            <li class="breadcrumb-item"><a href="?controller=exercise">Ejercicios</a></li>
                            <li class="breadcrumb-item"><a
                                    href="?controller=exercise&method=edit&id=<?php echo $exercise[0]->ejercicio_id; ?>">Editar
                                    ejercicio</a></li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="">
                <div class="">
                    <div class="card m-b-30">
                        <div class="card-body p-0">
                            <h4 class="header-title  m-3 ">Ejercicio <?php  echo $exercise[0]->nombre; ?></h4>
                            <div class="mb-5">
                                <div class="d-flex offset-md-6 pl-5 ">
                                    <a class=" btn btn-info  text-white " id="addElement"> <i
                                            class="fa fa-plus"></i>Músculo</a>
                                </div>
                                <!-- <form id="fVideo" enctype="multipart/form-data"> -->
                                    <div class="row mx-5">
                                        <div class=" col-md-4">
                                            <input type="hidden" value="<?php echo $exercise[0]->ejercicio_id?>"
                                                required data-parsley-required id="id">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" id="nombre" value="<?php echo $exercise[0]->nombre; ?>"
                                                name="nombre" required data-parsley-required placeholder="Nombre"
                                                class="form-control">

                                            <label for="file">Video </label>

                                            <div class="custom-file">
                                                <input type="file" id="file" name="file" class="custom-file-input"
                                                    required data-parsley-required lang="es"
                                                    aria-describedby="inputGroupFileAddon01" value="<?php echo $exercise[0]->video ?>">
                                                <label class="custom-file-label" data-browse="Elegir"
                                                    for="inputGroupFile01">Seleccione Video</label>
                                            </div>
                                            <div class=" mt-5 embed-responsive embed-responsive-16by9">
                                                        <video id="Mivideo" class="embed-responsive-item"
                                                            src="videos/<?php echo $exercise[0]->video?>" controls></video>
                                                    </div>
                                        </div>
                                        <div class="col-md-4 ">
                                            <label for="nombre">Musculos</label>
                                            <select class="form-control border" id="musculo" data-live-search="true">

                                                <option value="">Seleccione...</option>
                                                <?php foreach($muscles as $muscle): ?>
                                                <option value="<?php  echo $muscle->musculo_id?>">
                                                    <?php  echo $muscle->nombre?></option>

                                                <?php endforeach ?>
                                            </select>
                                             
                                            <label for="tipo">Tipo</label>
                                            <select id="tipo" nombre="tipo_ejercicio_id" required data-parsley-required
                                                class="form-control">
                                                <option value="">Seleccione...</option>
                                                <?php foreach($texercises as $texercise): ?>
                                                <?php   if($texercise->tipo_ejercicio_id == $exercise[0]->tipo_ejercicio_id){?>
                                                <option selected value="<?php  echo $texercise->tipo_ejercicio_id?>">
                                                    <?php  echo $texercise->nombre?></option>

                                                <?php }else{ ?>
                                                <option value="<?php  echo $texercise->tipo_ejercicio_id?>">
                                                    <?php  echo $texercise->nombre?></option>

                                                <?php }endforeach ?>
                                            </select>           
                                           
                                            <div class=" d-flex justify-content-end">
                                                <button id="update" class="ml-5 mt-5 btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                        <div class="offset-md-1 col-md-3 border-0">

                                            <table class="table table-hover table-responsive ">
                                                <h5 class=" pl-5 pb-0 mb-0 mt-0">Musculos</h5>
                                                <thead>
                                                    <tr>
                                                        <th>Musculo</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="list-muscles">
                                                    <?php
                                        
                                          if(count($musclesByExercise) > 0) {
                                              $arrExerciseMuscle= [];
                                              foreach($musclesByExercise as $muscle) {
                                                  array_push($arrExerciseMuscle, ['id' => $muscle->musculo_id,"name" => $muscle->nombre]);
                                              }
                                              ?>
                                                    <script>
                                                    var arrMuscles = <?php echo json_encode($arrExerciseMuscle); ?>
                                                    </script>
                                                    <?php
                                          } else {
                                              ?>
                                                    <script>
                                                    var arrMuscles = []
                                                    </script>
                                                    <?php
                                          }
                                      ?>

                                                </tbody>
                                            </table>
                                        </div>
                                <!-- </form> -->
                            </div>
                        </div>
                        <!--row-->
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
<script src="assets/js/parsley.min.js" ></script>
<script src="assets/js/es.js" ></script>
<script src="assets/js/exercise.js"></script>
