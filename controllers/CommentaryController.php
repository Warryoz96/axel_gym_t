<?php

require 'models/Commentary.php';



/**
 *  Controlador de usuarios
 */
class CommentaryController
{
	private $model;


	public function __construct()
	{
		$this->model = new Commentary;


	}

	public function index()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
			switch ($_SESSION['rol']) {

				case "Instructor":
					header('Location: ?controller=home');
					die();
					break;
			}

			require 'views/layouts/layout'.$_SESSION['rol'].'.php';

			$comments = $this->model->getAll();
			require 'views/comments/new.php';
			require 'views/comments/edit.php';
			require 'views/comments/list.php';
		}

	}




	public function save()
	{

		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
		// Recolecto los datos 
				$data = [
			
					'tipo' => $_POST['tipo'],
					'descripcion' => $_POST['descripcion'],
					'usuario_id' => $_SESSION['user']->usuario_id
				];
				//Mando datos }
					$this->model->newCommentary ($data);
				//Regirigo
				header('Location: ?controller=commentary');
			}

		
	}

	public function update()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
				if (isset($_POST)) {
					$this->model->editCommentary($_POST);
					header('Location: ?controller=commentary');
				} else {
					echo "Error, no se realizo";
				}
			}
	}
	public function delete()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
			$this->model->deleteCommentary($_REQUEST);
			header('Location: ?controller=commentary');
		}
	}


	public function updateStatus()
		{			
			if(!isset($_SESSION['user'])){	
				header('Location: ?controller=login');

			}else{

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
					}
		}

}
