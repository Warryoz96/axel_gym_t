
                

                 <!--REGISTER muscle modal -->
                 <div class="modal fade" id="registerCommentary" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header border-buttom border-primary text-dark">
          <h4 class="modal-title">Registro de comentarios</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
            <div class="container">
                
            <form action="?controller=commentary&method=save" method="post">
           
					<div class=" col-md-12 form-group">
						<label>Tipo</label>
						<input type="text" name="tipo" class="form-control" placeholder="Ingresa el tipo de comentario" >
                    </div>
                    <div class=" col-md-12 form-group">
                        
                        <textarea name="descripcion" class="form-control" rows="10" placeholder="Escribe tu opinion"></textarea>
						
                    </div>
                    
            </div> <!--Container-->
            <div class="modal-footer">
          <button  class="btn btn-primary ton text-white order-1">Registrar</button>
        </form> 
        <button  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  </div>