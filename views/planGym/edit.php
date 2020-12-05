<!--REGISTER muscle modal -->
<div class="modal fade" id="UploadPlanGym" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header text-primary  border-bottom border-primary">
                <h4 class="modal-title">Edición de planes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="?controller=plan&method=update&id=<?php echo $id ?>" method="post" required
                        data-parsley-required id="edit">
                        <div class="row">
                            <input type="hidden" name="detalle_plan_gym_id" readonly id="detalle_plan_id">
                            <input type="hidden" name="id" readonly value="<?php echo $id ?>">
                                <!-- <div class="form group col-md-6">
                                    <label for="fecha_inicial">Duración</label>
                                    <select class="custom-select du" data-parsley-required required id="fi">

                                        <option class="inputSelect" value="">Seleccionar...</option>
                                        <option class="inputSelect" value="1">1 mes</option>
                                        <option class="inputSelect" value="2">2 meses</option>
                                        <option class="inputSelect" value="3">4 meses</option>
                                        <option class="inputSelect" value="4">6 meses</option>
                                        <option class="inputSelect" value="5">1 año</option>
                                    </select>
                                </div> -->
                            <div class="form-group col-md-6">
                                <label for="fecha_final"> Fecha final</label>
                                <input class="form-control"readonly  type="date" id="fecha_final" data-parsley-required
                                    name="fecha_final">
                            </div>
                        </div>
                        <!--Row-->
                </div>
                <!--Container-->
            </div>
            <div class="modal-footer">
                <button class=" btn btn-primary  text-white order-1">Actualizar</button>
                </form>
                <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>