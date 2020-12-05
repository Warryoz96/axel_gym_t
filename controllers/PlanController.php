<?php


require 'models/User.php';
require 'models/PlanGym.php';



/**
 *  Controlador de horario
 */
class PlanController
{
	private $model;
	private $user;



	public function __construct()
	{
		$this->model = new PlanGym;
		$this->user = new User;
	}

	public function index()
    {

		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{

				$id = $_GET['id'];
				//Regirigo
				require 'views/layouts/layout'.$_SESSION['rol'].'.php';
				$plans = $this->model->getAll($id);
				$users = $this->user->getUserById($id);
				$id = !empty($plans)? $plans[0]->usuario_id : $_GET['id'] ;
				$userName = $users[0]->nombre . " " . $users[0]->apellido;
				require 'views/planGym/edit.php';
				require 'views/planGym/new.php';
				require 'views/planGym/list.php';
			}
	}
    public function save()
    {

		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{

				$id = $_GET['id'];
				$plan = [
					'fecha_inicial' => $_POST['fecha_inicial'],
					'fecha_final' => $_POST['fecha_final'],
					'estado' => 'Activo',
					'usuario_id' => $id

				];
				$this->model->new($plan);
				//Regirigo
				header('Location: ?controller=plan&id='.$id);
			}		
	}


	public function update()
	{
		
		if(!isset($_SESSION['user'])){	
			header('Location: ?controller=login');
		}else{
				
				if (isset($_POST)) {
					$id = $_POST['id'];
					$params = [
						"detalle_plan_gym_id" => $_POST['detalle_plan_gym_id'],
						"fecha_inicial" => $_POST['fecha_inicial'],
						"fecha_final" => $_POST['fecha_final'],

					];
					$this->model->EditSchedule($params);
					//Regirigo
					header('Location: ?controller=plan&id='.$id.'');	
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

				$this->model->deletePlanGym($_GET['id']);
				//Regirigo
				header('Location: ?controller=plan&id='.$_GET['id_usuario']);
			}
    }
    
}