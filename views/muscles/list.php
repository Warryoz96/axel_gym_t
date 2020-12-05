<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Musculos</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Axel</a></li>
                            <li class="breadcrumb-item"><a href="?controller=exercise">Ejercicios</a></li>
                            <li class="breadcrumb-item"><a href="?controller=muscle">Musculos</a></li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">


                            <div class="row mb-2">
                                <!-- row buttons -->
                                <div class="d-flex justify-content-start col-md-6">
                                    <a href="?controller=exercise"
                                        class=" mt-5 d-inline btn bg-button text-light">Volver</a>
                                </div>
                                <div class="d-flex justify-content-end col-md-6">
                                    <a data-target="#registerMuscle" data-toggle="modal"
                                        class=" mt-5 d-inline  btn bg-primary text-light" data-toggle="modal"> <i
                                            class="fa fa-plus"></i> Musculo</a>
                                </div>

                            </div> <!-- end row buttons -->
                            <h4 class="mt-0 header-title">Listado de ejercicios</h4>
                            <!-- <p class="sub-title">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->

                            <table id="datatable" class=" text-center table table-hover dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($muscles as $muscle): ?>
                                    <tr>
                                        <td><?php echo $muscle->musculo_id?></td>
                                        <td><?php echo $muscle->nombre ?></td>
                                        <td>
                                            <a href="#editMuscle" data-toggle="modal"
                                                class="btn btn-warning btnEditar"><i class="fa fa-pen"></i></a>
                                            <a href="?controller=muscle&method=delete&id=<?php echo $muscle->musculo_id ?>"
                                                class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
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
