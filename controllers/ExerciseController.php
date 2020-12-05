<?php

require 'models/Exercise.php';
require 'models/TypeExercise.php';
require 'models/Muscle.php';



/**
 *  Controlador de horario
 */
class ExerciseController
{
	private $model;
	private $texercise;
	private $muscle;



	public function __construct()
	{
		$this->model = new Exercise;
		$this->texercise = new TypeExercise;
		$this->muscle = new Muscle;
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

			$exercises= $this->model->getAll();
			$texercises= $this->texercise->getAll();
			$muscles= $this->muscle->getAll();	
			$Dmuscles = [];
			foreach ($exercises as $exercise):
				$musclesBi = $this->model->musclesByExercise($exercise->ejercicio_id);
				array_push($Dmuscles, $musclesBi);
			endforeach;
			require 'views/exercises/new.php';
			require 'views/exercises/list.php';
			
		
		}



	}
	

	public function muscles()
	{
		if(!isset($_SESSION['user'])){	
   	         header('Location: ?controller=login');
    	}else{
			$muscles= $this->model->getAllMusclesByExercise($_POST);
			
			echo json_encode($muscles);
			return;	
		}
	}
	

	public function edit()
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
			$exercise= $this->model->getExerciseById($_GET['id']);
			$texercises= $this->texercise->getAll();
			$muscles= $this->muscle->getAll();	
			$musclesByExercise = $this->model->getMuscleByExercise($_GET['id']);
			require 'views/exercises/edit.php';
		}

    }

    public function save()
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
		
		$idE= $this->model->getLast();
		echo ($idE[0]->id+1);
		$tmp =	$_FILES['file']['tmp_name'];

		move_uploaded_file($tmp, "videos/".($idE[0]->id+1).".mp4");
			$exercise = [
				'nombre' => $_POST['nombre'],
				'tipo_ejercicio_id' => $_POST['tipo'],
				'estado' => "Activo",
				'video' =>  ($idE[0]->id+1).".mp4"
			];

			$arrayMuscles = isset($_POST['muscles']) ? json_decode($_POST['muscles']) : [];

			var_dump($arrayMuscles[0]->name);

			if(!empty($arrayMuscles)) {
				//inserción Pelicula
				$respExercises= $this->model->newExercise($exercise);
				//Obtener El ultimo Id registrado de la tabla movie
				$idE= $this->model->getLast();
				//Inserción a la tabla category_movie
				$respMuscles = $this->model->newDmuscles($arrayMuscles, $idE[0]->id);
			} else {
				$respMuscles = false;
				$respExercises = false;
			}
			//validar si las inserciones se realizaron correctamente
			$arrayResp = [];

			if($respMuscles == true && $respExercises == true) {
				$arrayResp = [
					'success' => true,
					'message' =>  "Ejercicio Creado"
				];
			} else {
				$arrayResp = [
					'error' => false,
					'message' => "Error Creando el Ejercicio",
					'nombre' => $_POST['nombre']
				];
			}
			echo json_encode($arrayResp);
			return;
		}
			
	}

	public function update()
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
			$dataEjercicio = [];
			if(isset($_POST)) {
				$ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
				echo $ext;
				var_dump($ext);
				//organizar array para la tabla plan
				$dataEjercicio = [
					'ejercicio_id' => $_POST['ejercicio_id'],
					'nombre' => $_POST['nombre'],
					'tipo_ejercicio_id' => $_POST['tipo'],
					'video' => $_POST['ejercicio_id']."."."mp4"
				]; 

				//validar si las inserciones se realizaron correctamente
				if(isset($_FILES['file'])):
					$url =$_FILES['file']['tmp_name'];
					$name =	$_POST['ejercicio_id'];
					unlink($url ,"videos/".$name.".mp4");
					move_uploaded_file($url ,"videos/".$name.".mp4");
				endif;	

				$arrayResp = [];

				

					//variable con array de rutinas que llegan desde el Frontend
				$arrayMuscles = isset($_POST['muscles']) ? json_decode($_POST['muscles']) : [];

					if(!empty($arrayMuscles)) {

						//inserción Pelicula
						$respPlan = $this->model->edit($dataEjercicio);

						//crear metodo para eliminar las categorias de category_movie
						$this->model->deleteMuscleExercise($_POST['ejercicio_id']);
						
						//Inserción a la tabla category_movie
						$repsRoutinesMovie = $this->model->newDmuscles($arrayMuscles,$_POST['ejercicio_id']);
					} else {
						$respPlan = false;
						$repsRoutinesMovie = false;
					}
				}else{
					$arrayResp = [
						'error' => false,
						'message' => "Error Actualizando el ejercicio"
					];
				}

				echo json_encode($arrayResp);
				return;
			}
    }

	

	public function updateStatus()
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
				$exercise =	$this->model->getExerciseById($_REQUEST['id']);	
				$data = [];
					
					if ($exercise[0]->estado == 'Activo') {

						$data = [

									'ejercicio_id'=> $exercise[0]->ejercicio_id,
									'estado'=> 'Inactivo'

								];
					}	elseif ($exercise[0]->estado == 'Inactivo'){
						$data = [

									'ejercicio_id'=> $exercise[0]->ejercicio_id,
									'estado'=> 'Activo'

								];
					}
							$this->model->editexercise($data);
							header("Location: ?controller=exercise");
				}
			}

    
}