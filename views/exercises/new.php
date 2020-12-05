<!--modal register exercise-->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
<div class="modal fade" id="registerexercise" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl   modal-lg">
        <div class="modal-content">
            <div class="modal-header text-dark border-buttom border-primary">
                <h4 class="modal-title">Registro de ejercicios </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " >
                <div class="container">
                    <!-- <form action="#" id="fVideo"  enctype="multipart/form-data"> -->
                    <div class="row">
                        <div class=" col-md-4 mt-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required
                                data-parsley-required class="form-control">
                            
                            <label for="file">Video </label>

                            <div class="custom-file">
                                <input type="file" id="file" name="file" class="custom-file-input" required
                                    data-parsley-required lang="es" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" data-browse="Elegir" for="inputGroupFile01">Seleccione
                                    Video</label>
                            </div>
                        </div>
                        <div class="col-md-4 m-md-3">
                            <label for="nombre">Musculos</label>
                            <select class="form-control border" data-live-search="true" required data-parsley-required id="musculo" >

                                <option value="">Seleccione...</option>
                                <?php foreach($muscles as $muscle): ?>
                                <option value="<?php  echo $muscle->musculo_id?>"><?php  echo $muscle->nombre?></option>

                                <?php endforeach ?>
                            </select>
                            <label for="tipo">Tipo</label>
                            <select id="tipo" nombre="tipo_ejercicio_id" required data-parsley-required
                                class="form-control">
                                <option value="">Seleccione...</option>
                                <?php foreach($texercises as $texercise): ?>
                                <option value="<?php  echo $texercise->tipo_ejercicio_id?>">
                                    <?php  echo $texercise->nombre?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class=" mt-4 pt-3  d-flex  align-self-start">
                            <a class=" btn btn-info  text-white " id="addElement">
                                <i class="fa fa-plus"></i>Músculo</a>
                        </div>
                        <div class=" ml-3 col-md-1 mt-3">
                            <h6 class="ml-3">Principales</h6>

                            <div class=" form-group col-md-1 mt-0 align-self-end">


                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Musculo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-8" id="list-muscles">

                                <?php if(isset($musclesByExercise)) {
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
                            </div>
                        </div>
                    </div>
                    <!--row-->
                </div>
                <!--Container-->
            </div>
            <div class="modal-footer">
                <button id="submit" class="btn btn-primary text-white order-1">Registrar</button>
                <!-- </form> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

</script>
<script>
  
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->