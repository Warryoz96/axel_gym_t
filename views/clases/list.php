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
                            <img src="assets/images/svg222/034-gym.svg" class="img-fluid ml-1 " width="30" alt=""><span
                                class="badge badge-success badge-pill float-right"></span> <span> Clases grupales
                            </span>
                        </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                            <li class="breadcrumb-item"><a href="?controller=exercise">Clases grupales</a></li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row justify-content-end">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Listado de clases</h4>
                            <!-- <div class="row mb-2"><!-- row buttons -->
                            <?php if($_SESSION['rol'] === "Cliente" || $_SESSION['rol'] === "Instructor"){ ?>

                            <?php }else{  ?>
                            <div class=" d-flex justify-content-end  mb-1">
                                <button class="btn btn-primary " data-toggle="modal" data-target="#registerClass"> <i
                                        class="fa fa-plus"></i> Clase</button>
                                
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- </div>  <!-- end row buttons -->
        <section class="row dt-responsive nowrap" >
            <!--Estructura de una clase grupal-->
            <?php $url = $_SESSION['rol'] !== 'Instructor' ? "&id=".$clase->clase_id : "&method=indexInstructor&id=".$clase->clase_id."&ins=".$_SESSION['user']->usuario_id; ?>
            <?php foreach ($clases as $clase): ?>
            <div class="col-md-3">
                <div class="card m-b-30 border">
                <a href="?controller=schedule<?php echo $url ?>">
                    <img src="<?php  echo $clase->imagen?>" class="img-fluid">
                </a>
                    <div class="card-body">
                        <h4 class="mb-4 d-inline"><?php  echo $clase->nombre?></h4>
                        <div class="float-right">
                            <?php if($_SESSION['rol'] === 'Cliente' || $_SESSION['rol'] === 'Instructor'){ ?>
                            <?php }else{ ?>
                            <a class="btn btn-danger delete"
                                href="?controller=clase&method=delete&id=<?php  echo $clase->clase_id?>"><i
                                    class="fa fa-trash text-white" ></i></a>
                            <?php  } ?>
                        </div>
                        <div class=" mt-4">
                        <?php  if($_SESSION['rol'] === 'Instructor'): ?>
                            <a href="?controller=schedule&method=indexInstructor&id=<?php echo $clase->clase_id ?>&ins=<?php echo $_SESSION['user']->usuario_id ?>"
                                class="btn bg-info vh mr-5 text-white"> <i class="fa fa-hourglass-half text-white"></i>
                                Ver horarios</a>
                        <?php  else: ?>
                                <a href="?controller=schedule&id=<?php echo $clase->clase_id ?>"
                                class="btn bg-info vh mr-5 text-white"> <i class="fa fa-hourglass-half text-white"></i>
                                Ver </a>
                        <?php endif; ?>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->

            </div> <!-- end col-md4 -->
            <?php   endforeach;    ?>
        </section>

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
<script src="plugins/parsleyjs/parsley.min.js"></script>
<script src="assets/js/es.js"></script>
<script src="assets/js/clase.js"></script>
<script>


</script>
<!-- END wrapper -->