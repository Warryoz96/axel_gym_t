
    <main class="container-fluid ">
        
        <div class="row container">
            <div class="offset-md-6 col-md-1 mt-5">
                <h1 class="text-center">Clientes</h1>
            </div><!-- Div title-->
        </div>
        
       
<!-- Modal -->  
<div class="row pl-md-5 mr-md-5">
           <div class="col-md-5 col-sm-12  >
           <nav aria-label="breadcrumb"><!-- nav filtro -->  
            <h4>Filtrar por:</h4>
            <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="?controller=user">Usuarios</a></li>
                <li class="breadcrumb-item"><a href="?controller=user&method=cliente" >Clientes</a></li>
                <li class="breadcrumb-item active"><a href="?controller=user&method=empleados" >Empleados</a></li>
                <li class="breadcrumb-item active"><a href="?controller=user&method=inactivos" >Inactivos</a></li>

            </ol>  
            </nav><!-- nav filtro -->  
           </div>
           <div class=" offset-md-5 col-md-2">  
           <div><!-- div boton registrar -->  
                <button class="btn bg-info text-white mb-1" data-toggle="modal" data-target="#Plan">Agregar plan</button>           
            </div>  <!-- div boton registrar  -->
            <div><!-- div boton registrar -->  
                <button class="btn bg-button text-white" data-toggle="modal" data-target="#registerUser">Registrar</button>           
            </div>  <!-- div boton registrar  -->
           </div></div>

           <!-- Filtro -->  
           

            
           <section class="text-center col-md-12 table-responsive">
            <table class="table table-striped table-bordered ">
            <thead class="bg-secondary text-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Acciones</th>        
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user) :?>
                <tr>
                    <td><?php echo $user->usuario_id ?></td>
				      <td><?php echo $user->nombre ?></td>
				      <td><?php echo $user->apellido ?></td>
				      <td><?php echo $user->cedula ?></td>
                      <td><?php echo $user->correo ?></td>
                      <td><?php echo $user->telefono ?></td>
                      <td><?php echo $user->rol ?></td>
				      <td><?php echo $user->estado ?></td>
                    <td>    
                        <a  class="btn btn-info" data-toggle="modal" href="#Plan" ><i class="fa fa-list-alt text-white"></i></a>
                        <a class="btn btn-danger" href="?controller=user&method=delete&id=<?php echo $user->usuario_id ?>"><i class="fa fa-trash text-white" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </section>
     




     <!--modal Plan user-->
  <div class="modal fade" id="Plan" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-button text-white">
          <h3 class="modal-title">Registro de Planes de Gimnasio </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                
                <form action="?controller=user&method=savePlan" method="POST">
                    <div class="row">
                    <div class=" col-md-12 mb-2">
                        <label for="cliente">Cliente</label>
                        <select class="custom-select" name="usuario_id">

                            <option class="inputSelect"   id="rol">Seleccionar...</option>
                            <?php
                                foreach ($users as $user) {
                                    ?>
                            <option value="<?php echo $user->usuario_id?>"><?php echo $user->nombre?> <?php echo $user->apellido?> - <?php echo $user->cedula?></option>
                            <?php                                       
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="#">Fecha inicial</label>
                        <input type="date"  name="fecha_inicial" class="form-control">
                    </div>
                    <div class=" col-md-6  form-group">
                        <label for="nombre">Fecha final</label>
                        <input type="date"  name="fecha_final" class="form-control">
                    </div>
                </div>
                <div class="row" id="plan">

                </div>
            </div> <!--Container-->
            <div class="modal-footer">
          <button  class="btn btn-success ton text-white order-1">Registrar</button>
        </form> 
        <button  class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!--end modal register user-->                             
    </main><!-- Main Container-->
    <script src="assets/js/user.js"></script>