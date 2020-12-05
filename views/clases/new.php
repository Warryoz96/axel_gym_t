  <!--modal register class-->
<div class="modal fade" id="registerClass" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header text-primary border-buttom border-primary">
                <h4 class="modal-title">Registro de clases </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="?controller=clase&method=save" data-parsley-required  require method="POST" id="new"> 
                        <div class="row">
                            <div class=" col-md-12 mt-3">
                                <label for="nombre">Nombre</label>
                                <select class="form-control c" name="nombre" data-parsley-required data-parsley-checkclase data-parsley-checkclase-message="La clase ya se encuentra registrada"  require id="clase">
                                    <option value="">Selecione...</option>
                                    <option value="Aerobicos">Aerobicos</option>
                                    <option value="TaeBox">TaeBox</option>
                                    <option value="Rumba">Rumba</option>
                                    <option value="Danza Pilates">Danza Pilates</option>
                                    <option value="Abdominales">Abdominales</option>
                                    <option value="Funcionales">Funcionales</option>
                                </select>
                            </div>
                            <div class="col-md-6 image-preview" id="imagePreview">

                                <img src="" alt="Image Preview" class="image-preview__image img-fluid">
                                <span class="image-preview__default-text">Image-preview</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  class="btn btn-primary text-white order-1">Registrar</button>
                            </form>
                        <button  class="btn btn-secondary" data-dismiss="modal">Cerrar</button> 
                    </div>
                </div>
            </div>
                <!--Container-->
        </div>
    </div>

       

        <!--end modal register class-->