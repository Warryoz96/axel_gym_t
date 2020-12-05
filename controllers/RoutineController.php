<?php

require 'models/Routine.php';
require 'models/Exercise.php';




/**
 *  Conlador de usuarios
 */
class RoutineController
{
	private $model;
	private $exercise;


	public function __construct()
	{
		$this->model = new Routine;
		$this->exercise = new Exercise;


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

				$exercises = $this->exercise->getAllActive();
				$routines = $this->model->getAll();
				
				require 'views/rutinas/new.php';
				require 'views/rutinas/list.php';


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
				$exercises = $this->exercise->getAllActive();
				$routine = $this->model->getRoutineById($_GET['id']);
				$ExerciseRoutine = $this->model->getExerciseByRoutine($_GET['id'],$_GET['ed'] );

				require 'views/rutinas/edit.php';

			}

	}
	
	public function exercisesRoutine()
	{	
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{

			require 'views/layouts/layout'.$_SESSION['rol'].'.php';
			$exercises = $this->model->getExerciseByRoutine($_GET['id']);
			$nombre = $exercises[0]->rutina_id;
			$rutina = $this->model->getRoutineById($_GET['id']);
			require 'views/rutinas/listExerciseRoutine.php';
		}
	}

	public function exercisesRoutineF()
	{	
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{

			require 'views/layouts/layout'.$_SESSION['rol'].'.php';
			$rutina = $this->model->getRoutineById($_GET['id']);
			$exercise = $this->model->getExerciseByRoutine($_GET['id']);
			$exercises = $this->model->getAllRoutine($_GET['id'],$_GET['ed']);
			$muscles = $this->exercise->getAllMusclesByExerciseVideo($_GET['ed']);
			require 'views/rutinas/listByExercise.php';
		}
	}

	
	public function save()
	{

		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
				// Recolecto los datos para la tabla usuario
				$dataRutina = [
					'nombre' => $_POST['nombre']		
				]; 
			// Mando array con lso datos 
				

				$arrayExercises = isset($_POST['exercises']) ? $_POST['exercises'] : [];

				if(!empty($arrayExercises)) {

					//inserción Pelicula
					$respRoutine= $this->model->newRoutine($dataRutina);
					//Obtener El ultimo Id registrado de la tabla movie
					$idR= $this->model->getLast();

					//Inserción a la tabla category_movie
					$respExercises = $this->model->newDetailsRoutine($arrayExercises, $idR[0]->id);

				} else {
					$respRoutine = false;
					$respExercises = false;
				}


				//validar si las inserciones se realizaron correctamente
				$arrayResp = [];

				if($respRoutine == true && $respExercises == true) {
					$arrayResp = [
						'success' => true,
						'message' =>  "Ejercicio Creado"
					];
					
				} else {
					$arrayResp = [
						'error' => false,
						'message' => "Error Creando la Rutina",
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
				//validar si las inserciones se realizaron correctamente
				$arrayResp = [];

				if(isset($_POST)) {

					//organizar array para la tabla plan
					$dataRutina = [
						'rutina_id' => $_POST['rutina_id'],
						'nombre' => $_POST['nombre']		
					]; 

					//variable con array de rutinas que llegan desde el Frontend
					$arrayexercise = isset($_POST['exercises']) ? $_POST['exercises'] : [];

					if(!empty($arrayexercise)) {

						//inserción Pelicula
						$respPlan = $this->model->edit($dataRutina);

						//crear metodo para eliminar las categorias de category_movie
						$this->model->deleteExerciseRoutine($_POST['rutina_id']);
						
						//Inserción a la tabla category_movie
						$repsRoutinesMovie = $this->model->newDetailsRoutine($arrayexercise,$_POST['rutina_id']);
					} else {
						$respPlan = false;
						$repsRoutinesMovie = false;
					}
				}else{
					$arrayResp = [
						'error' => false,
						'message' => "Error Actualizando la rutina"
					];
				}

				echo json_encode($arrayResp);
				return;
		
			}
    }

}
