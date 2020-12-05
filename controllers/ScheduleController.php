<?php

require 'models/Schedule.php';
require 'models/User.php';



/**
 *  Controlador de horario
 */
class ScheduleController
{
	private $model;
	private $user;



	public function __construct()
	{
		$this->model = new Schedule;
		$this->user = new User;	
	}


	public function index()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
				$id= $_GET['id'];
				//Regirigo
				require 'views/layouts/layout'.$_SESSION['rol'].'.php';
				$className= '';
				$clase_id= '';
				$schedules= $this->model->getAll($id);
				if(!empty($schedules)){
					$instructors = $this->user->getAllInstructorActivated();
					
					$clase_id = $schedules[0]->clase_id;
					$className = $schedules[0]->clase;
				}
				require 'views/schedule/edit.php';
				require 'views/schedule/listSchedule.php';
			}
		
	}

	public function indexInstructor()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
				$id= $_GET['id'];
				$ins= $_GET['ins'];

				//Regirigo
				require 'views/layouts/layout'.$_SESSION['rol'].'.php';

				$schedules= $this->model->getAllInstructorSchedule($id,$ins);
				if(isset($schedules[0]->clase_id)):
					$className = $schedules[0]->clase;
					$clase_id = $schedules[0]->clase_id;
				endif;
			
				require 'views/schedule/listScheduleInstructor.php';
			}
		
	}


	public function edit()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
		
				$id= $_POST['hora_id'];
				//Regirigo
				
				$schedules= $this->model->getSheduleById($id);

				$user = $this->user->getAll();
				// retorno datos al  javaScript
					
				echo json_encode($schedules[0]);
			}
	}

    public function saveSchedule()
	{
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
			$data = [
				"dia" => $_POST['dia'],
				"hora_inicio" => $_POST['inicio'],
				"hora_final" => $_POST['fin'],
				"usua_id" => $_POST['usua_id'],
				"clase_id" => $_POST['clase'],
			];
			$this->model->newSchedule($data);
			//Regirigo
			echo json_encode(true);
		}
	}


	public function update()
	{
		
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
	
				if (isset($_POST)) {
					$clase_id =$_POST["clase_id"];
					$this->model->EditSchedule($_POST);
					//Regirigo
					header('Location: ?controller=schedule&id='.$clase_id.'');	
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
		
			$this->model->deleteSchedule($_REQUEST);
			//Regirigo
			header('Location: ?controller=clase');
		}	
    }
}