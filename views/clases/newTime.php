 <!--start  horarie modal-->
 <div class="modal fade" id="registerHour" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog   modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-dark border-buttom border-primary">
                        <h4 class="modal-title"> Registro de horarios</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class="container">
                                <!--row-->
                                <div class="row ">
                                    <h4 class="col-md-12">Horarios</h4>
                                    <div class="col-md-6 mt-1">

                                    <label class=" for="dia ">fecha</label>
                                            <input type="text" autocomplete="off" name="dia" class="form-control"  data-parsley-required  id="dia" placeholder="yy/mm/dd">
                                    </div>
                                    <div class="col-md-6 mt-1">

                                    <label>Clase</label>
                            <select name="clase_id" data-parsley-required required   class="form-control border" data-live-search="true" id="class"  >
                                <option value="">Seleccione...</option>   
                                <?php
                                    foreach ($clases as $clase) {
                                        ?>
                                            <option value="<?php echo $clase->clase_id ?>"><?php echo $clase->nombre ?></option>
                                        <?php                                       
                                    }
                                ?>
                            </select>      
                                    </div>
                                    <div class="form-group col-md-12 mt-1">
                                        <label for="instructor">Instructor</label>
                                        <select class="form-control border" data-parsley-required required   data-live-search="true" name="usua_id" id="instructor">
                                        <option value="">Seleccione...</option>                             

                                        <?php foreach ($instructors as $instructor): ?>       

                                        <option value="<?php  echo $instructor->usuario_id?>"><?php  echo $instructor->nombre?></option>                                        
                                        <?php endforeach ?> 
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6 mt-1">
                                        <label for="nombre">Inicio</label>
                                        <input type="time" name="hora_inicio"    data-parsley-required required class="form-control" id="inicio">
                                    </div>
                                    <div class="form-group col-md-6 mt-1">
                                        <label for="nombre">Final</label>
                                        <input type="time" name="hora_final"    data-parsley-required required class="form-control" id="fin">
                                    </div>
                                </div>
                        </div>
                        <!--Container-->
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-primary text-white order-1" id="newTimeButton">Registrar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End horario modal-->
        <script>

        </script>
        <script src="assets/js/schedules.js"></script>
       
