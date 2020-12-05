<?php

require 'models/Muscle.php';



/**
 *  Conlador de usuarios
 */
class MuscleController
{
	private $model;


	public function __construct()
	{
		$this->model = new Muscle;

	}

	public function index()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{

			switch ($_SESSION['rol']) {

				case "Cliente":
					header('Location: ?controller=home');
					die();
					break;
			}
				require 'views/layouts/layout'.$_SESSION['rol'].'.php';
				$muscles= $this->model->getAll();
				require 'views/muscles/new.php';
				require 'views/muscles/edit.php';
				require 'views/muscles/list.php';   

		}


		
	}


	

	public function save()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
			//Mando datos e ingreso un nuevo plan
			$this->model->newMuscle($_POST);
			//Regirigo
			header('Location: ?controller=muscle');
		}

		
	}

	public function update()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{

				$data = [
					'musculo_id' => $_POST["musculo_id"],
					'nombre' => $_POST["nombre"]
				];
				
				if (isset($_POST)) {
					$this->model->editMuscle($data);
					
					header('Location: ?controller=muscle');
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

			 $res = $this->model->deleteMuscle($_GET['id']);
			// header('Location: ?controller=muscle');
			echo json_encode($res);
		}
	}
	public function checkName(){
		if(isset($_POST['nombre'])){
			$emailRes = $this->model->VerifyName($_POST['nombre']);
			echo json_encode($emailRes['success']);
			
		}
	}
	


	
}
