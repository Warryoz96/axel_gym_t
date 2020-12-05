<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Recuperación de contraseña</title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="images/fitness.ico">
        <link href="plugins/nestable/jquery.nestable.css" rel="stylesheet" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style2.css" rel="stylesheet" type="text/css">
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css">
    </head>

    <body class="bg">

        <!-- Begin page -->
        <div class="accountbg"></div>

        <div class="wrapper-page">
                <div class="card card-pages shadow-none">
    
                    <div class="card-body">
                        <div class="text-center m-t-0 m-b-15">
                                <a href="?controller=login" class="logo logo-admin"><img src="assets/images/fitness.jpg" alt="" height="130"></a>
                        </div>
                        <h1 class=" font-30 text-center">Recuperación de contraseña:</h5>
    
                        <form class="form-horizontal m-t-30" data-parsley-required action="?controller=login&method=forgetPasswordStep2"  method="post" id="login" >

                        <?php
							if(isset($res) && $res !== FALSE) {
                        ?>
                            <div class=" alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $res ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
						<?php
                            }if(isset($success) && $success !== FALSE){ ?> 
                            <div class=" alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?php echo $success ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            
                            <?php } ?>
                            <div class=" form-group">
                                <div class="col-12">
                                        <label>Correo Electrónico <i class="text-danger">*</i> </label>
                                    <input class="form-control bg-input" data-parsley-type="email" data-parsley-required   type="text" name="email"  placeholder="Correo Electrónico">
                                </div>
                            </div>

    
                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary text-white btn-block btn-lg waves-effect waves-light" >Verificar</button>
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
    </script>
  

    </body>

</html>