<!--REGISTER muscle modal -->
<div class="modal fade" id="editMuscle" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header border-buttom border-primary text-dark">
                <h4 class="modal-title">Actualización de musculo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="container">

                    <form action="?controller=muscle&method=update" data-parsley-required method="post"
                        id="new">
                        <input type="hidden" id="musculo_id" name="musculo_id">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required
                                data-parsley-required placeholder="Ingrese el nombre del musculo">
                        </div>
                </div>
                <!--Container-->
                <div class="modal-footer">
                    <button class="btn btn-primary  ton text-white order-1">Actualizar</button>
                    </form>
                    <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>