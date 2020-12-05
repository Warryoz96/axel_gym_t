<!-- register routine-->

<title>Rutinas</title>
<main class="container ">
    <div class="modal fade" id="registerRoutine" data-backdrop="static" data-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl   modal-lg">
            <div class="modal-content">
                <div class="modal-header text-dark border-buttom border-primary">
                    <h4 class="modal-title">Registro de rutinas </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container ">
                        <!-- <form id="new" data-parsley-validate> -->
                            <div class="row mx-1">
                                <div class="col-md-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" data-parsley-required data-parsley-length="[4, 20]"
                                    data-parsley-pattern="/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g" placeholder="Nombre" class="form-control">

                                    <label for="series">Series</label>
                                    <input type="text" id="series"  data-parsley-type="integer"  placeholder="Series" class="form-control">

                                </div>
                                <div class="col-md-3">
                                <label for="nombre">Ejercicios</label>
                                    <select class="form-control border" data-live-search="true" data-parsley-pattern="/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g" id="ejercicio">
                                        <option value="">Seleccione...</option>
                                        <?php foreach($exercises as $exercise): ?>
                                        <option value="<?php  echo $exercise->ejercicio_id?>">
                                            <?php  echo $exercise->nombre?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <label for="repeticiones">Repeticiones</label>
                                    <input type="text" id="repeticiones" data-parsley-type="integer" placeholder="Repeticiones"
                                        class="form-control">
                                </div>
                                <div class=" mt-4 pt-2  d-flex  align-self-start">  
                                    <a class=" btn btn-info  text-white " id="addElement">
                                        <i class="fa fa-plus"></i> Ejercicio</a>
                                </div>

                                <div class="col-md-4 align-self-start">
                                    <h6 class="text-center pb-0 mb-0 mt-0">Detalle</h6>
                                    <table class=" table table-bordered ">
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
                                    if(isset($routinesPlan)) { ?>
                                            <script>
                                            var arrExercises = <?php echo json_encode($ExerciseRoutine); ?>
                                            </script>
                                            <?php  } else {   ?>
                                            <script>
                                            var arrExercises = []
                                            </script>
                                            <?php  }  ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--row-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="submit" class="btn btn-primary text-white order-1">Registrar</button>
                    <!-- </form> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</main><!-- Main Container-->
