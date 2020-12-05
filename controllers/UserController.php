<?php

// 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PhpMailer/Exception.php';
require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';
require 'models/User.php';
require 'models/Rol.php';


/**
 *  Conlador de usuarios
 */
class UserController
{
	private $model;
	private $rol;

	public function __construct()
	{
		$this->model = new User;
		$this->rol = new Rol;

	}
	public function index()
	{
		if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador'):
			require 'views/layouts/layoutAdministrador.php';
			$roles= $this->rol->getAll();
			$users = $this->model->getAll();
			$subs = $this->model->getAllSubs();
			require 'views/usuarios/new.php';
			require 'views/usuarios/edit.php';
			require 'views/usuarios/list.php';
		else:
			header('Location: ?controller=home');
		endif;	

	}

	public function save()
	{
		// Recolecto los datos para la tabla usuario
		if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador'){
				$dataUser = [

					'nombre' => $_POST['nombre'],
					'apellido' => $_POST['apellido'],
					'cedula' => $_POST['cedula'],
					'clave' => rand(),
					'correo' => $_POST['correo'],
					'estado' => "Activo",
					'telefono' => $_POST['telefono'],
					'rol_id' => $_POST['rol'],
					
				]; 

				$mail = new PHPMailer(true);
				$mail->CharSet = 'UTF-8';
				$nombres = $dataUser['nombre']." ".$dataUser['apellido'];
				$email  = $dataUser['correo'];
				$clave = $dataUser['clave'];
				// Enviar correo al nuevo usuario
				try {
					//Server settings
					$mail->SMTPDebug = 0;                      // Enable verbose debug output
					$mail->isSMTP();                                            // Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
					$mail->Username   = 'axelsena274@gmail.com';                     // SMTP username
					$mail->Password   = 'AxelSportSena274';                               // SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
					$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

					//Recipients
					$mail->setFrom('axelsena274@gmail.com', 'axel gym');
					$mail->addAddress($email);     // Add a recipient            // Name is optional

					// Content
					$mail->isHTML(true);     
					$subject = "Bienvenido a Axel Gym!";
					$subject = utf8_decode($subject);                             // Set email format to HTML
					$mail->Subject = $subject;
					$mail->Body    = '<!DOCTYPE html>
					<html lang="en">
					<head>
						<meta charset="UTF-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
					</head>
					<body>
						<table style="border: 1px solid black;width: 100%;">
							<thead>
								<tr>
									<td style="text-align: center;background: #011E67;color:#e9e8e8" colspan="2">
										<h1><b>Estimad@'.$nombres.' estamos contentos en empezar este gran cambio para usted</b></h1>
									</td>
								</tr>
								<tr>
									<td style="text-align: left;" width="20%">
										<img src="https://i.ibb.co/xg8s0nG/fitness.jpg"  style="border-radius: 100%;"
										class="d-inline-block align-top" alt="logo">
									</td>
									<td style="text-align: center;"><span style="font-size: 25px;"> Usuario: "'.$email.'" <br>Contraseña: '.$clave.'
										
										<br>
										<br>
										<a href="http://localhost/vertical/?controller=login"
									style="border: 1px solid; border-radius:5px; background: #011E67; text-decoration: none; color:#e9e8e8; font-size:22px; padding:3px; font-weight:25px;"" >Iniciar Sesión</a>
									</span></td>
								</tr>
							</thead>
						</table>
					</body>
					</html>';	
					$mail->send();
					$success = true;
				} catch (Exception $e) {
					echo $success = "Error a lenviar el correo{$mail->ErrorInfo}";
				}
			// Mando array con lso datos del usuario a registrar
				$this->model->newUser($dataUser);

			// Valido si fue un cliente quien fue registrado
				if (isset($_POST['fecha_inicial'])) :
					//Traigo el id del usuario registrado
					$id = $this->model->getLast();
					// recolecto los datos del plan
					$dataPlan = [
						'fecha_inicial' => $_POST['fecha_inicial'],
						'fecha_final' => $_POST['fecha_final'],
						'estado' => 'Activo',
						'usuario_id' =>  $id[0]->id
					]; 
					//Mando datos e ingreso un nuevo plan
					$this->model->newPlan($dataPlan);		
			

				endif;
				header("Location: ?controller=user");
		}else{
			// header('Location: ?controller=home');
		}
	}

	public function edit()
	
	{
		if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador'):

		// 
			$usuario_id = $_POST['usuario_id'];

			$user = $this->model->getUserById($usuario_id);
			
			echo json_encode($user[0]);
		else:
			header('Location: ?controller=home');
		endif;	
	}

	public function savePlan()
	{
		if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador' && isset($_POST['fecha_inicial'])):

			// Recolecto los datos para la tabla detalle_plan_gym
			
			$dataPlan = [
				'fecha_inicial' => $_POST['fecha_inicial'],
				'fecha_final' => $_POST['fecha_final'],
				'estado' => 'Activo',
				'usuario_id' => $_POST['usuario_id']
			];
			//Mando datos e ingreso un nuevo plan
				$this->model->newPlan($dataPlan);
			//Regirigo
			header('Location: ?controller=user&method=cliente');
					
		else:
			header('Location: ?controller=home');
		endif;	
		
	}
	

	public function update()
	{
		echo '<pre>';
		var_dump($_POST);
		echo '</pre>';
		if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador'):

			if (isset($_POST['correo'])) {
				$this->model->editUser($_POST);
				header('Location: ?controller=user');
			} else {
				echo "Error, no se realizo";
			}
		else:
			header('Location: ?controller=home');
		endif;	
	}
	public function delete()
	{
		if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador'):
			$this->model->deleteUser($_REQUEST);
			header('Location: ?controller=user');

		else:
			header('Location: ?controller=home');
		endif;	
	}

	


	public function updateStatus()
		{			
			if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador'):

				$user =	$this->model->getUserById($_REQUEST['id']);	
				$data = [];
			
				if ($user[0]->estado == 'Activo') {

					$data = [

								'usuario_id'=> $user[0]->usuario_id,
								'estado'=> 'Inactivo'

					    	];
						
				}	elseif ($user[0]->estado == 'Inactivo'){
					 $data = [

							 	'usuario_id'=> $user[0]->usuario_id,
								'estado'=> 'Activo'

							];
				}
				
						$this->model->editUser($data);
						header("Location: ?controller=user");
			else:
				header('Location: ?controller=home');
			endif;		
		}

		public function profile()
	{
		if (isset($_SESSION['rol'])):
			require 'views/layouts/layout'.$_SESSION['rol'].'.php';
			$users = $this->model->profile();
			require 'views/usuarios/profile.php';
		else:
			header('Location: ?controller=home');
		endif;		
		
	}
	public function DuplicateEntriesEmail(){
		if(isset($_POST['email'])){
			$emailRes = $this->model->VerifyEmail($_POST['email']);
			echo json_encode($emailRes['success']);
			
		}
	}
	public function DuplicateEntriesCedula(){

		if(isset($_POST['cedula']) ){
			$cedulaRes = $this->model->VerifyCedula($_POST['cedula']);
			echo json_encode($cedulaRes['success']);
		}
		
	}
	public function changePassword(){

		if(isset($_POST['clave']) ){
			$data = ["clave" => $_POST['clave'] ];
			$res = $this->model->changePassword($data);
			echo json_encode($res);
		}
		
	}
	public function checkPassword(){
		if(isset($_POST['clave'])){
			$claveRes = $this->model->VerifyPasword($_POST['clave']);
			echo json_encode($claveRes['success']);
			
		}
	}

}


// else: 

// 	header("Location: ?controller=home");
// endif;	