<?php
	require 'models/Clase.php';
	require 'models/Commentary.php';
	require 'models/User.php';

	/**
	 * Clase HomeController para carga el home del proyecto
	 */
	class HomeController
	{		
		private $clase;
		private $commentary;
		private $instructor;

		public function __construct(){
			$this->clase = new Clase();
			$this->commentary = new Commentary();
			$this->instructor = new User();
		}
		public function index()
		{
			if(!isset($_SESSION['user'])){
				
				header('Location: ?controller=login');
			}else{
				$customers = $this->commentary->getAll();
				$clases = $this->clase->getAll();
				$instructors = $this->instructor->getAllInstructorActivated();
				require 'views/layouts/layout'.$_SESSION['rol'].'.php';
				require 'views/clases/newTime.php';	
				require 'views/Start.php';
				
			}
        }

		public function home()
		{

			require 'home.php';
		}
	}