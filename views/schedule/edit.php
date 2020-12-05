 <!--start  horarie modal-->
 <div class="modal fade" id="EditHour" data-backdrop="static" data-keyboard="false" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-dark border-buttom border-primary">
                        <h4 class="modal-title">Edición de horarios de clase </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class="container">
                            <form action="?controller=schedule&method=update" required data-parsley-required method="POST" id="edit">
                                <!--row-->
                                <div class="row ">
                                <input type="hidden" name="clase_id" required data-parsley-required id="clase_id">
                                <input type="hidden" name="hora_id" required data-parsley-required  id="hora_id">
                                    <div class="col-md-6 mt-1">

                                        <label for="dia">Dia</label>
                                        <input type="text" id ="dia" required data-parsley-required  name="dia" class="form-control" >
                                    </div>
                                    <div class="form-group col-md-6 mt-1">
                                        <label for="instructor">Instructor</label>
                                        <select class="form-control" id="usua_id"  required data-parsley-required  name="usua_id">
                                            <option value=" ">Seleccione...</option>
                                        <?php foreach ($instructors as $instructor): ?>       

                                        <option value="<?php  echo $instructor->usuario_id?>"><?php  echo $instructor->nombre?></option>                                        
                                        <?php endforeach ?> 
                                        </select>

                                    </div>
                                    <div class="form-group col-md-6 mt-1">
                                        <label for="nombre">Inicio</label>
                                        <input type="time" id="hora_inicial" name="hora_inicio" required data-parsley-required  class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 mt-1">
                                        <label for="nombre">Final</label>
                                        <input type="time"  id="hora_final" name="hora_final" required data-parsley-required  class="form-control">
                                    </div>

                                        

                                </div>
                        </div>
                        <!--Container-->
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-primary text-white order-1">Actualizar</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End horario modal-->
        <script>
            $("#dia").datepicker({ minDate: 0 , maxDate:"+1Y"});
        </script>
        <script src="assets/js/schedules.js"></script>
       
