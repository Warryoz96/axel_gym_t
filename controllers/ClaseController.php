<?php

require 'models/Clase.php';
require 'models/User.php';



/**
 *  Controlador de Clases
 */
class ClaseController
{
	private $model;
	private $instructor;


	public function __construct()
	{
		$this->model = new Clase;
		$this->instructor = new User;

	}

	public function index()
	{	
		
		if(!isset($_SESSION['user'])){	
				header('Location: ?controller=login');
		}else{
					$clases = $this->model->getAll();
					$instructors = $this->instructor->getAllInstructorActivated();
					require 'views/layouts/layout'.$_SESSION['rol'].'.php';
					require 'views/clases/new.php';	
					require 'views/clases/newTime.php';	
					require 'views/clases/list.php';
			}
		
	}

	

	public function save()
	{
		// Recolecto los datos para la tabla usuario
		if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador'):
			$img = '';
			switch ($_POST['nombre']) {
				case 'Aerobicos':
					$img = 'images/clases/aerobicos.jpg';
					break;
				case 'TaeBox':
					$img = 'images/clases/taebox.jpg';
					break;
				case 'Rumba':
					$img = 'images/clases/rumba.jpg';
					break;
				case 'Danza Pilates':
					$img = 'images/clases/pilates.jpg';
					break;
				case 'Abdominales':
					$img = 'images/clases/abdomen.jpg';
					break;
				case 'Funcionales':
					$img = 'images/clases/funcional.jpg';
					break;
			} 
			$dataClass = [
				'nombre' => $_POST['nombre'],
				'estado' => 'Activo',
				'imagen' => $img
				
			]; 

			$this->model->newClass($dataClass);
			
			header('Location: ?controller=clase');
		else:
			header('Location: ?controller=home');
		endif;
		
	}
	public function DuplicateClase(){
		if(isset($_POST['nombre'])){
			$claseRes = $this->model->VerifyClase($_POST['nombre']);
			echo json_encode($claseRes['success']);
			
		}
	}
	public function checkTime(){
		if(isset($_POST['usua_id'])){
			$data =[
				"usua_id" => $_POST['usua_id'],
				"inicio" => $_POST['inicio'],
				"dia" => $_POST['dia'],
				"fin" => $_POST['fin']
			];
			$res = $this->model->checkTimeInstructor($data);
			echo json_encode($res);
			
		}
	}

	public function checkClass(){
		if(isset($_POST['nombre'])){
			
			$claseRes = $this->model->VerifyClase($_POST['nombre']);
			echo json_encode($claseRes['success']);
			
		}
	}

	public function delete()
	{
		if( isset($_SESSION['user'])):
		 $res = $this->model->deleteClass($_GET['id']);
		 echo json_encode($res);
		endif;
	}

	public function times(){
		if( isset($_SESSION['user'])):
			$res; 
			if($_SESSION['rol'] == 'Instructor'){
				$res = $this->model->getTimesIns();
			}else{
				$res = $this->model->getTimes();
			}
			
		   endif;
		   echo json_encode($res);
	}


	

}
