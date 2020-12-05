<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Edicion de rutinas</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                            <li class="breadcrumb-item"><a href="?controller=routine">Rutinas</a></li>
                            <li class="breadcrumb-item"><a
                                    href="?controller=routine&method=edit&id=<?php echo $routine[0]->rutina_id; ?>">Editar
                                    Rutina</a></li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="">
                <div class="">
                    <div class="card m-b-30">
                        <div class="card-body p-0">
                            <h4 class="header-title  m-3 ">Rutina <?php   echo $routine[0]->nombre ?></h4>
                            <div class="mb-5">
                                <div class="d-flex offset-md-6 pl-5 ">
                                    <a class=" btn btn-info  text-white " id="addElement"> <i
                                            class="fa fa-plus"></i>Ejercicio</a>
                                </div>
                                <!-- <form id="editR" data-parsley-validate> -->
                                <div class="row mx-5">
                                    <div class="col-md-4">
                                        <input type="hidden" value="<?php echo $routine[0]->rutina_id ?>" id="id">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" id="nombre" value="<?php echo $routine[0]->nombre ?>"
                                            data-parsley-required data-parsley-length="[4, 20]"
                                            data-parsley-pattern="/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g"
                                            placeholder="Nombre" class="form-control">
                                        <label for="series">Series</label>
                                        <input type="text" id="series" data-parsley-type="integer" placeholder="Series"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nombre">Ejercicios</label>
                                        <select class="form-control border" id="ejercicio" data-live-search="true">
                                            <option value="">Seleccione...</option>
                                            <?php foreach($exercises as $exercise): ?>
                                            <option value="<?php  echo $exercise->ejercicio_id?>">
                                                <?php  echo $exercise->nombre?></option>
                                            <?php endforeach ?>
                                        </select>

                                        <label for="repeticiones">Repeticiones</label>

                                        <input type="text" id="repeticiones" data-parsley-type="integer"
                                            placeholder="repeticiones" id="repeticiones" placeholder="Repeticiones"
                                            class="form-control">
                                        <div class=" d-flex justify-content-end">
                                            <button id="update" class="ml-5 mt-5 btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4 align-self-start">
                                        <h5 class="text-center pb-0 mb-0 mt-0">Rutina</h5>
                                        <table class=" table table-bordered table-responsive ">
                                            <thead>
                                                <tr>
                                                    <th>Ejercicio</th>
                                                    <th>Series</th>
                                                    <th>Reps</th>
                                                    <th>Borrar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list-exercises">
                                                <?php
                                                if(isset($ExerciseRoutine)) {
                                                    $arrExerciseRoutine = [];
                                                    foreach($ExerciseRoutine as $exercise) {
                                                        array_push($arrExerciseRoutine, ['id' => $exercise->ejercicio_id,"name" => $exercise->ejercicio, "series" => $exercise->series,"reps" => $exercise->repeticiones]);
                                                    }
                                                                                ?>
                                                <script>
                                                var arrExercises = <?php echo json_encode($arrExerciseRoutine); ?>
                                                </script>
                                                <?php
                                                    } else {
                                                ?>
                                                <script>
                                                var arrExercises = []
                                                </script>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                    <!-- </form>  -->



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

<script src="plugins/parsleyjs/parsley.min.js"></script>
<script src="assets/js/es.js"></script>
<script src="assets/js/routine.js"></script>