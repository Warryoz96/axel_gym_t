<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Axel || Gym</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="images/fitness2.ico">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
       <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/flaticon.css"/>
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- DataTables -->
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/sweet-alert2/sweetalert2.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Responsive datatable examples -->
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/nestable/jquery.nestable.css" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style2.css" rel="stylesheet" type="text/css">

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="?controller=home" class="logo">
                        <span class="logo-light">
                        <img src="assets/images/fitness.ico" class=" mt-1 img-fluid " width="55px" style="border-radius:50%"  alt="">  Axel Fitness
                        </span>
                        <span class="logo-sm">
                          <img src="assets/images/fitness.ico"  class=" mt-1 img-fluid w-75"  style="border-radius:100%"   alt="">
                        </span>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">
                        <!-- full screen -->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                            </a>
                        </li>
                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="fa fa-user mr-2"></i><?php echo $_SESSION['nombre'].''.$_SESSION['apellido'] ?>
                                    <div class="d-none d-sm-inline-block"><b class="ml-2">Cargo: </b><?php echo $_SESSION['rol'] ?></div> 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="?controller=user&method=profile"><i class="mdi mdi-account-circle"></i> Perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="?controller=login&method=logout"><i class="mdi mdi-power text-danger"></i>Cerrar Sesion</a>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="?controller=home" class="waves-effect">
                                    <img src="assets/images/svg222/carrera.svg" class="img-fluid ml-1 " width="27" alt=""><span class="badge badge-success badge-pill float-right"></span> <span> Inicio </span>
                                </a>
                            </li>
                            <li>
                                <a href="?controller=clase" class="waves-effect">
                                    <img src="assets/images/svg222/034-gym.svg" class="img-fluid ml-1 " width="30" alt=""><span class="badge badge-success badge-pill float-right"></span> <span> Clases grupales </span>
                                </a>
                            </li>
                            <li>
                                <a href="?controller=training" class="waves-effect">
                                    <img src="assets/images/svg222/043-personal.svg" class="img-fluid ml-1" width="30" alt=""><span class="badge badge-success badge-pill float-right"></span> <span> Planes de entreno </span>
                                </a>
                            </li>
                            <li>
                                <a href="?controller=routine" class="waves-effect">
                                    <img src="assets/images/svg222/024-checklist.svg" class="img-fluid ml-1" width="30" alt=""><span class="badge badge-success badge-pill float-right"></span> <span>    Rutinas </span>
                                </a>
                            </li>
                            <li>
                                <a href="?controller=exercise" class="waves-effect">
                                    <img src="assets/images/svg222/049-muscle.svg" class="img-fluid ml-1" width="30" alt=""><span class="badge badge-success badge-pill float-right"></span> <span> Ejercicios </span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
                 <!-- ============================================================== -->
         

             <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>
        <script src="plugins/parsleyjs/parsley.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
        <!-- Required datatable js -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/buttons.colVis.min.js"></script>
        <script src="plugins/nestable/jquery.nestable.js"></script>
        <script src="assets/pages/nestable-init.js"></script>>
        <!-- Responsive examples -->
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <!-- Datatable init js -->  
        <script src="assets/pages/datatables.init.js"></script>   
          <!-- sweet alert --> 
          <script src="plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="assets/pages/sweet-alert.init.js"></script> 
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"> </script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>

        
        
    </body>

</html>