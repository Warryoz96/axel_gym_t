<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Inicio de sesion</title>
</head>
<body class="  img-fluid bg ">
    <main class="container-fluid">
        <section class="row vh-100">
            <div class=" col-md-4 m-auto bg-white br pt-4 pb-4 pr-5 pl-5 border border-secondary ">
                    <div class="">
                        <div class="row col-md-12">     
                            <img src="images/fitness.ico" 
                            alt="logo" class="img img-fluid m-auto" >
                                <h3 class=" text-center mt-4 text-body mb-4"> Entrar a Axel Fitness: </h3>                            
                        </div> <!---header-->
                    <form action="?controller=login&method=login" method="post">

                            
                    <?php
							if(isset($error['errorMessage'])) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $error['errorMessage'] ?></strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
						<?php
							}
                        ?>
                        
                        <div class="form-group  input-group-lg">
                            <input type="email" name="email" value="<?php echo isset($error['email']) ? $error['email'] : '' ?>" class="form-control text-dark bg-input" placeholder="Correo Electronico">
                        </div> <!--form group email-->
                        <div class="form-group  input-group-lg">
                            <input type="password" name="clave" class="form-control text-dark bg-input " placeholder="Contraseña">
                        </div> <!--for-group password-->
                            <button class="btn bg-button btn-block btn-lg  text-light ">Ingresar</button>
                            <div class="mt-3">
                                <a href="verificar-usuario.html" class="text-info">¿Olvidaste tu contraseña?</a>
                            </div> <!--footer-->
                    </form> 
                </div>
                </div> <!-- body-->
         </section>  
    </main> <!--container-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>