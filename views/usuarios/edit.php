<!--modal Edit user-->
<div class="modal fade" id="EditUser" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header text-primary  border-bottom border-primary">
          <h4 class="modal-title">Edición de usuarios</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    
        <div class="modal-body">
            <div class="container">
           
                <form action="?controller=user&method=update" method="POST" id="editU">
                <input type="hidden" id="usuario_id" name="usuario_id">
                  <div class="row">
                
                    <div class="col-md-6">
                    <label for="#">Nombre</label>
                        <input type="text" id="nombre"  name="nombre" data-parsley-required minlength="4"  maxlength="20" data-parsley-length="[3, 20]"	data-parsley-pattern="^[a-zA-Z]+$"  required  class="form-control">
                    </div>
                    <div class=" col-md-6  form-group">
                        <label for="nombre">Apellido</label>
                        <input type="text"   id="apellido" data-parsley-required minlength="4"  maxlength="20" data-parsley-length="[3, 20]"	data-parsley-pattern="^[a-zA-Z]+$"  required  name="apellido" class="form-control">
                    </div>
                    <div class=" col-md-4  form-group">
                        <label for="nombre">Cédula</label>
                        <input type="text"  id="cedula"   data-parsley-check-cedula  name="cedula" data-parsley-required  data-parsley-type="integer"  required   class="form-control">
                    </div>
                    <div class=" col-md-4  form-group">
                        <label for="nombre">Correo</label>
                        <input type="email"  id="correo"   data-parsley-check-email name="correo" data-parsley-required  data-parsley-type="email" required class="form-control">
                    </div>
                    <div class=" col-md-4  form-group">
                        <label for="nombre">Télefono</label>
                        <input type="text"  id="telefono" name="telefono"  minlength="10" min="10" data-parsley-minlength="10" data-parsley-type="integer"   data-parsley-required  required class="form-control">
                    </div>
                   
                </div>
            </div> <!--Container-->
            <div class="modal-footer">
          <button  class="btn btn-primary ton text-white order-1">Actualizar</button>
        </form> 
        <button  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  </div>

                <!-- end editar usuario-->
  <!--end modal edit user-->