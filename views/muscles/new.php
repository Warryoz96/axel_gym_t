
                

                 <!--REGISTER muscle modal -->
 <div class="modal fade" id="registerMuscle" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header border-buttom border-primary text-dark">
          <h4 class="modal-title">Registro de músculos</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
            <div class="container">
            <form action="?controller=muscle&method=save" required data-parsley-required method="post" id="edit">
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" name="nombre" class="form-control" id="name" data-parsley-checkname data-parsley-checkname-message="Ya existe un musculo con ese nombre" data-parsley-trigger="focusout" placeholder="Ingrese el nombre del musculo" required data-parsley-required>
					</div>
            </div> <!--Container-->
            <div class="modal-footer">
          <button  class="btn btn-primary  ton text-white order-1">Registrar</button>
        </form> 
        <button  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  </div>