<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Iniciar Sesión</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="images/fitness2.ico">
    <link href="plugins/nestable/jquery.nestable.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style2.css" rel="stylesheet" type="text/css">
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
</head>

<body class="bg ">

    <!-- Begin page -->
    <div class="accountbg"></div>

    <div class="wrapper-page">
        <div class="card card-pages shadow-none">

            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <a href="?controller=login" class="logo logo-admin"><img src="assets/images/fitness.jpg" alt=""
                            height="130"></a>
                </div>
                <h1 class=" font-30 text-center">Iniciar Sesión:</h5>

                    <form class="form-horizontal m-t-30" data-parsley-required action="?controller=login&method=login"
                        method="post" id="login">
                        <?php if(isset($error['errorMessage'])) { ?>
                        <div class=" alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $error['errorMessage'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php	}  ?>
                        <div class=" form-group">
                            <div class="col-12">
                                <label>Correo Electrónico <i class="text-danger">*</i> </label>
                                <input class="form-control bg-input" data-parsley-required data-parsley-type="email"
                                    type="email" name="email" placeholder="Correo Electrónico">
                            </div>
                        </div>
                        <div class=" form-group">
                            <div class="col-12">
                                <label>Contraseña<i class="text-danger">*</i> </label>
                                <div class="input-group mb-1">
                                        <input class="form-control bg-input" data-parsley-required type="password"
                                        id="password" name="clave" placeholder="Contraseña">
                                        <!-- <button class="btn btn-outline-secondary" type="button" id="showP"><i
                                                class="fa fa-eye"></i></button> -->
                                </div>
                                

                            </div>
                        </div>
            </div>
            <div class="form-group">
                <div class="form-group text-center m-t-20">
                    <div class="col-12">
                        <button
                            class="btn btn-primary text-white btn-block btn-lg waves-effect waves-light">Ingresar</button>
                    </div>
                </div>
                <div class="form-group text-center row m-t-30 m-b-0">
                    <div class="col-sm-7">
                        <a href="?controller=login&method=forgetPasswordStep1" class="text-muted   text-info"><i
                                class="fa fa-lock m-r-5"></i> ¿Olvidaste tu contraseña?</a>
                    </div>

                </div>
                </form>
            </div>

        </div>
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.min.js"></script>
    <!-- App js -->
    <script src="plugins/parsleyjs/parsley.min.js"></script>
    <script src="assets/js/es.js"></script>
    <script src="assets/js/app.js"></script>


    <script>
    $(document).ready(function() {
        $('#login').parsley();
    });


    document.querySelector("#showP").addEventListener("click",()=>{
        let password = document.querySelector("#password")
        password.type = password.type == "text" ? "password" : "text" 
    })
    </script>


</body>

</html>