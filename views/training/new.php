<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Registro de planes</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                            <li class="breadcrumb-item"><a href="?controller=training">Planes de entreno</a></li>
                            <li class="breadcrumb-item"><a href="?controller=training&method=new">Nuevo plan</a></li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class=" col-md-12 ">
                    <div class="card">
                        <div class="card-body p-0">
                            <h4 class="header-title m-3">Nuevo plan</h4>
                            <div class="mb-5 pr-2">
                                <div class="d-flex offset-md-7 pl-5 ">
                                    <a class=" btn btn-info  text-white " id="addElement"> <i class="fa fa-plus"></i> Rutina</a>
                                </div>
                                <!-- <form id="new"> -->
                                <div class="row mx-5">
                                    <div class="col-md-3">
                                        <label class="mt-2" for="nombre">Nombre</label>
                                        <input type="text" id="nombre" placeholder="Nombre" class=" mt-1 form-control"
                                            data-parsley-required minlength="4" maxlength="20"
                                            data-parsley-length="[4, 20]"
                                            data-parsley-pattern="/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g">
                                        <label class="mt-2" for="nombre">Peso inicial</label>
                                        <input type="text" id="peso_inicial" data-parsley-type="integer"
                                            data-parsley-required placeholder="peso inicial en kg"
                                            class=" mt-1 form-control">
                                        <label class="mt-2" for="nombre">Porcentaje incial</label>
                                        <input type="text" id="porcentaje_inicial"
                                            placeholder="porcentaje de grasa inicial" data-parsley-type="integer"
                                            data-parsley-required class=" mt-1 form-control">
                                    </div>
                                    <div class="col-md-3">

                                        <label class="mt-2" for="cliente">Cliente</label>
                                        <select name="cliente" id="cliente" data-parsley-required
                                            class=" mt-1 form-control border" data-live-search="true">
                                            <option value="">Seleccione...</option>

                                            <?php foreach ($users as $user): ?>

                                            <option value="<?php echo $user->usuario_id ?>">
                                                <?php echo $user->cedula.' '.$user->nombre.' '.$user->apellido ?>
                                            </option>

                                            <?php endforeach;?>
                                        </select>
                                        <label class="mt-2" for="nombre">Peso final</label>
                                        <input type="text" id="peso_final" data-parsley-type="integer"
                                            placeholder="Peso final en kg" class=" mt-1 form-control">

                                        <label class="mt-2" for="nombre">Porcentaje final</label>
                                        <input type="text" id="porcentaje_final"
                                            placeholder="porcentaje de grasa corporal" data-parsley-type="integer"
                                            class=" mt-1 form-control">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mt-2" for="nombre">Rutinas</label>
                                        <select name="objetivo" id="routine" data-parsley-required data-live-search="true" class="border form-control">
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($routines as $routine): ?>

                                            <option value="<?php echo $routine->rutina_id ?>">
                                                <?php echo $routine->nombre?> </option>

                                            <?php endforeach;?>
                                        </select>
                                        <label class="mt-2" for="dia ">fecha</label>
                                       
                                        <input type="text" id="dia" class="form-control" placeholder="dd/mm/yy" data-parsley-required>
                                       
                                        <label class="mt-2" for="repeticiones">Objetivo</label>
                                        <select name="objetivo" id="objetivo" data-parsley-required
                                            class="form-control mt-1">
                                            <option value="">Seleccione...</option>
                                            <option value="Bajar de peso">Bajar de peso</option>
                                            <option value="Hipertrofiar">Hipertrofiar</option>
                                            <option value="Mejorar condicion fisica">Mejorar condicion fisica
                                            </option>
                                            <option value="Otro">Otro.</option>

                                        </select>
                                        <div class="ml-5 pl-3 mb-3">
                                            <button id="submit" class="ml-5 mt-5 btn btn-primary">Registrar</button>
                                        </div>
                                    </div>


                                    <div class="col-md-3 align-self-start">
                                        <h5 class="text-center pb-0 mb-0 mt-0">Plan</h5>
                                        <table class=" table table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Rutinas</th>
                                                    <th>Día</th>
                                                    <th>Quitar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list-Routines">

                                            </tbody>
                                            <?php if(isset($routinesPlan)) { ?>
                                            <script>
                                            var arrRoutines = <?php echo json_encode($routinesPlan); ?>
                                            </script>
                                            <?php   } else {  ?>
                                            <script>
                                            var arrRoutines = []
                                            </script>
                                            <?php   } ?>
                                        </table>

                                    </div>
                                    <!-- </form> -->
                                </div>
                                <!--row-->
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->






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
<script src="assets/js/training.js"></script>