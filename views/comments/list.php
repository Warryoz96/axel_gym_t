            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">
                                    <img src="assets/images/svg222/realimentacion.svg" class="img-fluid ml-1" width="30" alt=""><span class="badge badge-success badge-pill float-right"></span> <span> Comentarios </span>
                                    </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
										<li class="breadcrumb-item"><a href="?controller=exercise">Comentarios</a></li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
									
									<?php if($_SESSION['rol'] !== 'Administrador'): ?>
                                    <div class="row mb-2"><!-- row buttons -->
										<div class="d-flex justify-content-end col-md-12">
										<a href="#registerCommentary" data-toggle="modal" class="btn bg-primary	 text-light"> <i class="fa fa-plus"></i> Comentario</a>
										</div>	
										
                            
									</div>  <!-- end row buttons -->
                                            <?php endif; ?>    
                                        <h4 class="mt-0 header-title">Listado de comentarios</h4>
                                     
                                    <table  id="datatable"class=" text-center table table-hover dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
										<thead class="bg-light">
											<tr>
												<th>#</th>
												<th>Tipo</th>
												<th>Descripcion</th>
												<th>Usuario</th>
                                                <?php if($_SESSION['rol'] !== 'Administrador'): ?>
												<th>Acciones</th>
                                                <?php endif; ?>   
											</tr>
										</thead>
										<tbody>
											<?php foreach ($comments as $commentary): ?>
												<tr>
													<td><?php echo $commentary->comentario_id ?></td>
													<td><?php echo $commentary->tipo ?></td>
													<td><?php echo $commentary->descripcion ?></td>
													<td><?php echo $commentary->nombre ?></td>
                                                    <?php if($_SESSION['rol'] !== 'Administrador'): ?>
													<td>
                                                  
													<a href="#editcommentary" data-toggle="modal" class="btn btn-warning btnEditar"><i class="fa fa-pen text-white"></i></a>
													<a href="?controller=commentary&method=delete&id=<?php echo $commentary->comentario_id ?>" class="btn btn-danger delete"><i class="fa fa-trash"></i></a>

													</td>
                                                    <?php endif; ?>   
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
		<script src="assets/js/comments.js"></script>