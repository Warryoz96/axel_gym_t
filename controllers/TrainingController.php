<?php

require 'models/Training.php';
require 'models/Routine.php';
require 'models/User.php';




/**
 *  Conlador de usuarios
 */
class TrainingController
{
	private $model;
    private $routine;
    private $user;


	public function __construct()
	{
		$this->model = new Training;
        $this->routine = new Routine;
        $this->user = new User;


	}

	public function index()
	{
        if(!isset($_SESSION['user'])){	
            header('Location: ?controller=login');
    }else{
        $plans = $this->model->getAll();
        switch($_SESSION['rol']) {

            case 'Cliente':
            $plans = $this->model->getPlans();
            break;
        }
        require 'views/layouts/layout'.$_SESSION['rol'].'.php';
		require 'views/training/list.php';
			
            }
		
    }
    
    

    public function play()
	{
        if(!isset($_SESSION['user'])){	
            header('Location: ?controller=login');
         }else{
            
            require 'views/layouts/layout'.$_SESSION['rol'].'.php';
            $plan = $this->model->getPlanById($_GET['id']);
            $routines = $this->model->getRoutinesByPlan($_GET['id']);
            $name = $plan[0]->nombre;
            require 'views/training/Droutines.php';
        } 
    }

	public function new()
	{
        switch ($_SESSION['rol']) {
            case "Cliente":
                header('Location: ?controller=home');
                die();
                break;
        }
        
        require 'views/layouts/layout'.$_SESSION['rol'].'.php';
        $routines = $this->routine->getAll();
        $users = $this->user->getAllClients();
        require 'views/training/new.php';
    }
    
    public function edit()
	{
        switch ($_SESSION['rol']) {

            case "Cliente":
                header('Location: ?controller=home');
                die();
                break;
        }
        $routines = $this->routine->getAll();
        $users = $this->user->getAllClients();
        $plan = $this->model->getPlanById($_GET['id']);
        $routinesPlan = $this->model->getRoutinesByPlanWithoutName($_GET['id']);
        require 'views/layouts/layout'.$_SESSION['rol'].'.php';
        var_dump($routinesPlan);
		require 'views/training/edit.php';
		
	}

	
	public function routinesRoutine()
	{
		require 'views/layouts/layout'.$_SESSION['rol'].'php';
		$routines = $this->model->getAllRoutine($_GET['id']);
		$routines = $this->model->getAll();
		$rutina = $routines[0]->nombre;
		require 'views/training/listroutineRoutine.php';
	}

	
	public function save()
	{
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador' || $_SESSION['rol'] ==='Instructor'):

		    // Recolecto los datos para la tabla usuario
            $dataPlan= [
                'nombre' => $_POST['nombre'],
                'usuario_id' => $_POST['cliente'],
                'peso_inicial' => $_POST['peso_inicial'],
                'peso_final' => $_POST['peso_final'],
                'porcentaje_inicial' => $_POST['porcentaje_inicial'],
                'porcentaje_final' => $_POST['porcentaje_final'],
                'objetivo' => $_POST['objetivo']
        
            ]; 
         // Mando array con lso datos 
            

            $arrayroutines = isset($_POST['routines']) ? $_POST['routines'] : [];

            if(!empty($arrayroutines)) {

                //inserción plan
                $respRoutine= $this->model->new($dataPlan);
                //Obtener El ultimo Id registrado de la tabla plan
                $idR= $this->model->getLast();

                //Inserción a la tabla category_movie
                $resproutines = $this->model->newDetailsRoutines($arrayroutines, $idR[0]->id);

            } else {
                $respRoutine = false;
                $resproutines = false;
            }


            //validar si las inserciones se realizaron correctamente
            $arrayResp = [];

            if($respRoutine == true && $resproutines == true) {
                $arrayResp = [
                    'success' => true,
                    'message' =>  "Plan Creado"
                ];
                
            } else {
                $arrayResp = [
                    'error' => false,
                    'message' => "Error Creando el plan",
                ];
            }

            echo json_encode($arrayResp);
            return;
        else:
			header('Location: ?controller=home');
		endif;	
		
    }
    
    public function update()
    {
    
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador' || $_SESSION['rol'] ==='Instructor'):

        //validar si las inserciones se realizaron correctamente
        $arrayResp = [];

        if(isset($_POST)) {

            //organizar array para la tabla plan
            $dataPlan= [

                'plan_id' => $_POST['plan_id'],
                'nombre' => $_POST['nombre'],
                'usuario_id' => $_POST['cliente'],
                'peso_inicial' => $_POST['peso_inicial'],
                'peso_final' => $_POST['peso_final'],
                'porcentaje_inicial' => $_POST['porcentaje_inicial'],
                'porcentaje_final' => $_POST['porcentaje_final'],
                'objetivo' => $_POST['objetivo']
            ]; 

            //variable con array de rutinas que llegan desde el Frontend
            $arrayroutines = isset($_POST['routines']) ? $_POST['routines'] : [];

            if(!empty($arrayroutines)) {

                //inserción Pelicula
                $respPlan = $this->model->edit($dataPlan);

                //crear metodo para eliminar las categorias de category_movie
                $this->model->deleteRoutinesPlan($_POST['plan_id']);
                
                //Inserción a la tabla category_movie
                $repsRoutinesMovie = $this->model->newDetailsRoutines($arrayroutines,$_POST['plan_id']);
            } else {
                $respPlan = false;
                $repsRoutinesMovie = false;
            }
        }else{
            $arrayResp = [
                'error' => false,
                'message' => "Error Actualizando el plan"
            ];
        }

        echo json_encode($arrayResp);
        return;
    else:
        header('Location: ?controller=home');
    endif;	
    }


	
}
