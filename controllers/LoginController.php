<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PhpMailer/Exception.php';
	require 'PhpMailer/PHPMailer.php';
	require 'PhpMailer/SMTP.php';
	require 'models/User.php';
	/**
	 * Clase Controlador Login
	 */
	class LoginController
	{		
		private $model;

		public function __construct()
		{
			$this->model = new User;
		}

		public function index()
		{
			if(isset($_SESSION['user'])) {
				header('Location: ?controller=home');
			} else {
				require "views/pages-login.php";
			}
		}

		public function login()
		{
			if(isset($_POST['email'])):
				$validateUser = $this->model->validateUser($_POST);

				if($validateUser === true) {
					header('Location: ?controller=home');
				} else {
					$error = [
						'errorMessage' => $validateUser,
						'email' => $_POST['email']
					];
					require "views/pages-login.php";
				}
			else:
				header('Location: ?controller=login');
			endif;	
		}

		public function logout()
		{
			if(isset($_SESSION['user'])):
				session_destroy();			
			header('Location: ?controller=login');		
			else:
				header('Location:?controller=login');
			endif;
		}
	

		public function forgetPasswordStep1()
		{
			if(isset($_SESSION['user'])) {
				header('Location: ?controller=home');
			} else {
				require "views/forgetPassword/checkEmail.php";
			}
		}

		public function forgetPasswordStep2()
		{
			
			if(isset($_SESSION['user'])) {
				header('Location: ?controller=home');
			} else {
				if(isset($_POST["email"])):
				$res = FALSE;
				$success = FALSE;
				$email = $_POST["email"];
				$validateEmail = $this->model->validateEmail($email);

				if(isset($validateEmail["res"]) === true){
				$clave = $validateEmail["datos"][0]->clave;
				$nombres = $validateEmail["datos"][0]->nombre.$validateEmail["datos"][0]->apellido;
				$mail = new PHPMailer(true);
				$mail->CharSet = 'UTF-8';
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
					$subject = "Recuperación de contraseña Axel Gym";
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
										<h1><b>Señor '.$nombres.' hemos recuperado la contraseña de su cuenta</b></h1>
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
					$success = 'Mensaje enviado';
				} catch (Exception $e) {
					$success = "Error a lenviar el correo{$mail->ErrorInfo}";
				}
				}else{
					$res = $validateEmail;
				}	
				endif;
				require "views/forgetPassword/checkEmail.php";
			}
		}
}
