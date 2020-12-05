<!--REGISTER muscle modal -->
<div class="modal fade" id="registerPlanGym" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header text-primary border-bottom border-primary">
                <h4 class="modal-title">Registro de planes</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="?controller=plan&method=save&id=<?php echo $id ?>" method="post" required
                        data-parsley-required id="new">
                        <div class="row">
                            

                            <div class="form group col-md-12">
                                <label for="fecha_inicial">Duración</label>
                                <select class="custom-select du" data-parsley-required required id="fi">

                                    <option class="inputSelect" value="">Seleccionar...</option>
                                    <option class="inputSelect" value="1">1 mes</option>
                                    <option class="inputSelect" value="2">2 meses</option>
                                    <option class="inputSelect" value="3">4 meses</option>
                                    <option class="inputSelect" value="4">6 meses</option>
                                    <option class="inputSelect" value="5">1 año</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha_inicial"> Fecha inicial</label>
                                <input class="form-control" readonly id="f_ini" required data-parsley-required type="date"
                                    name="fecha_inicial">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha_final"> Fecha final</label>
                                <input class="form-control"  readonly id="f_fin" type="date" required data-parsley-required
                                    name="fecha_final">
                            </div>
                        </div>
                        <!--Row-->
                </div>
                <!--Container-->
            </div>
            <div class="modal-footer ">
                <button class="btn btn-primary ton text-white order-1">Registrar</button>
                </form>
                <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>