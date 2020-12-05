<?php
	
	session_start();	
	//LLamado a la Clase de Conexión
	require 'providers/Database.php';

	//Inicializar variable de controlador por defecto
	$controller = 'HomeController';

	//Validación de acciones tomar
	if(!isset($_REQUEST['controller'])) {
		//Llamado al controlador por defecto
		require 'controllers/'.$controller. '.php';

		$controller = ucwords($controller);
		$controller = new $controller;
		$controller->index();
	} else {
		//cuando existe solicitud desde el front
		$controller = ucwords($_REQUEST['controller'] . 'Controller');
		// condicional ternario  Condición     condición verdadera	 condición falsa
		$method = isset($_REQUEST['method']) ? $_REQUEST['method'] : 'index';

		
		if(file_exists('controllers/'.$controller.'.php')){
			
			require 'controllers/'.$controller.'.php';
			$controller = new $controller;
			if(method_exists($controller,$method)== true):
			call_user_func(array($controller,$method));
			else:
				require 'pages/pages-404.html';

			endif;
		}else{

			require 'pages/pages-404.html';
		}
			
		

		//realizar llamado a metodos

		

		

	}
