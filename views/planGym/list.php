            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                <h4 class="text-center mt-4">Subscripciones de gimnasio del cliente <strong><?php  echo $userName;?></strong></h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
										<li class="breadcrumb-item"><a href="?controller=user">Usuarios</a></li>
                                        <li class="breadcrumb-item"><a href="?controller=plan&id=1">Subscripciones <?php echo $userName?> </a></li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
									
									
                                    <div class="row mb-2"><!-- row buttons -->
										<div class="d-flex justify-content-start col-md-6">
                                            <a href="?controller=user"  class="btn btn-outline-secondary text-dark">Volver</a>
										</div>	
										<div class="d-flex justify-content-end col-md-6">
                                            <a href="#registerPlanGym" data-toggle="modal" class="btn btn-primary text-light"><i class="fa fa-list"></i> Plan</a>
										</div>
                            
									</div>  <!-- end row buttons -->    
                                        <h4 class="mt-0 header-title">Listado de ejercicios</h4>
                                        <!-- <p class="sub-title">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->
                                     
                                        <table id="datatable" 
                                            class="text-center table table-hover dt-responsive nowrap" 
                                             style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										    <thead class="bg-light text-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fecha inicial</th>
                                                    <th>Fecha final</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($plans as $plan): ?>
                                                    <tr>
                                                        <td ><?php echo $plan->detalle_plan_gym_id ?></td>
                                                        <td ><?php echo $plan->fecha_inicial ?></td>
                                                        <td ><?php echo $plan->fecha_final ?></td>
                                                        <td> <b class="mt-2 badge text-wrap <?php echo $estado = $plan->estado == 'Activo'? ' badge-success ': 'badge-danger';  ?> "><?php echo $plan->estado ?></b></td>
                                                        <td>
                                                            <a href="?controller=plan&method=delete&id_usuario=<?php echo $plan->usuario_id ?>&id=<?php echo $plan->detalle_plan_gym_id ?>" class="btn btn-danger text-white delete"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                    </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                        

                        
                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->
				<footer class="footer">
                    © 2019 - 2020 Axel Gym <span class="d-none d-sm-inline-block"> - Todos los derechos reservados.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

         
        </div>
        <!-- END wrapper -->    	
<script src="plugins/parsleyjs/parsley.min.js"></script>
<script src="assets/js/es.js"></script>

<script>
    $('#new').parsley().on('field:success', function() {
            // In here, `this` is the parlsey instance of #some-input
            });
    $('#edit').parsley().on('field:success', function() {
    // In here, `this` is the parlsey instance of #some-input
    });       
</script>
<script src="assets/js/muscles.js"></script>
<script src="assets/js/planGym.js"></script>
