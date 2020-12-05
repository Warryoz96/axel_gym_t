<?php

/**
 * Modelo de Usuario
 */
class Routine
{
	private $routine_ic;
	private $nombre;

	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new Database;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function getAll()
	{
		try {
			$strSql = "SELECT * from rutina";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
    }
    

    public function getAllRoutine($id, $ed)
	{
		try {
			$strSql = " SELECT * FROM vw_ejerciciosrutina where rutina_id= {$id} and ejercicio_id = {$ed} ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}



    
        public function newRoutine($data)
        {
        	try {
                $this->pdo->insert('rutina', $data);
                return true;
        	} catch (PDOException $e) {
        		die($e->getMessage());
        	}
        }

        public function newDetailsRoutine($arrayExercises,$lastIdRoutine)
        {
        	try {

                foreach ($arrayExercises as $exercise) {

                    $data = [
                       
                        'series' => $exercise['series'],
                        'repeticiones' => $exercise['reps'],
						'ejercicio_id' => $exercise['id'],
						'rutina_id' => $lastIdRoutine
                        
					];
					$this->pdo->insert('detalle_rutina', $data);
                }

                
                return true;
        	} catch (PDOException $e) {
        		die($e->getMessage());
        	}
        }
        public function getLast()
        {
        	try {
        		$strSql = "SELECT MAX(rutina_id) as id from rutina";
        		$query = $this->pdo->select($strSql);
        		return $query;
        	} catch (PDOException $e) {
        		die($e->getMessage());
        	}
		}
		
		public function edit($data)
		{
			try {
				$strWhere = 'rutina_id=' . $data['rutina_id'];
				$this->pdo->update('rutina', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}
        public function editRoutine($data)
        {
        	try {
        		$strWhere = 'rutina_id=' . $data['rutina_id'];
        		$this->pdo->update('rutina', $data, $strWhere);
        	} catch (PDOException $e) {
        		die($e->getMessage());
        	}
		}
		
		public function deleteExerciseRoutine($id)
		{
			try {
				$strWhere = 'rutina_id =' . $id;
				$this->pdo->delete('detalle_rutina', $strWhere);
				return true;
			} catch (PDOException $e) {
				return $e->getMessage();
			}
		}

		public function getExerciseByRoutine($id)
		{
			try {
					$strSql = "SELECT dr.rutina_id as rutina_id ,e.ejercicio_id,e.nombre as ejercicio, dr.series, dr.repeticiones  from detalle_rutina dr 
							inner join ejercicio e on e.ejercicio_id = dr.ejercicio_id 
							where dr.rutina_id={$id} and e.estado = 'Activo'";
						
				$query = $this->pdo->select($strSql);
				return $query;
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		


		
		public function getRoutineById($id)
	{
		try {
			$strSql = "SELECT r.*  from rutina r where r.rutina_id={$id}";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    	
}
