<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/flaticon.css"/>
    <!-- <link rel="stylesheet" href="../assets/css/font-awesome.min.css"  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="bg-body">
    <header>
        <!--NAV BAR-->
        <nav class="navbar  sticky-top   bg-nav navbar-light navbar-expand-lg ">
            <div class="container-fluid">
                <!--Icono-->
                <img src="images/fitness.ico" alt="logo" class="ml-5 ico img-fluid">
                <!--Hamburger Button-->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myToggleNav"
                    aria-controls="myToggleNav" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggler-icon"></span></button>

                <!--Content nav-->
                <div class="collapse navbar-collapse justify-content-md-center" id="myToggleNav">

                    <div class="navbar-nav ml-3">

                        <a class="nav-item nav-link active" href="?controller=home">
                            <img src="images/nav/sydney-opera-house.svg" class="text-white" width="20px" alt="">
                            Inicio</a>
                        <a class="nav-item nav-link" href="?controller=user">
                            <img class="text-white" src="   images/nav/usuario-2.svg" width="20px" alt="">
                            <i class="text-light"></i>
                            Usuarios</a>
                        <a class="nav-item nav-link" href="?controller=clase">
                            <img src="images/nav/pizarra.svg" width="20px" alt=""> Clases Grupales</a>
                        <a class="nav-item nav-link" href="#">
                            <img src="images/nav/gimnasio.svg" width="25px;" alt=""> Planes de entreno</a>
                        <a class="nav-item nav-link" href="?controller=routine">
                              <img src="images/nav/gimnasio-2.svg" width="25px" alt=""> Rutinas</a>
                        <a class="nav-item nav-link" href="?controller=exercise">
                            <img src="images/nav/musculo.svg" width="20px" alt=""> Ejercicios</a>
                        <a class="nav-item nav-link" href="?controller=commentary">
                            <img src="images/nav/comentario.svg" width="20px" alt=""> </i>Comentarios</a>
                        <!--Dropdown Item-->
                        <div class="dropdown pl-lg-5 ml-lg-5  ">
                            <a class="nav-item nav-link dropdown-toggle text-dark" href="" data-toggle="dropdown" id="profile"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="images/nav/usuario.svg" width="25px" alt="">
                                <!-- <?php echo $_SESSION['user']->nombre?></a> -->Yo</a>
                            <div class="dropdown-menu" aria-label="profile">
                                <a class="dropdown-item" href="?controller=user&method=profile">
                                    <img src="images/nav/usuario-2.svg" class=" mr-0" width="18px" alt=""> Ver Perfil</a>
                                <a class="dropdown-item" href="?controller=login&method=logout">
                                    <img src="images/nav/cerrar-sesion.svg" width="20px" alt=""> Cerrar Sesión</a>
                            </div>
                            <!--Dropdown menu-->
                        </div>
                        <!--Dropdown-->
                    </div>
                    <!--Navbar-->
                </div>
                <!--Collapse-->
            </div>
            <!--Container-->
        </nav>
        <!--Nav-->
    </header>
    
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    
