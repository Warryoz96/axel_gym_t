<?php

/**
 * Modelo de Usuario
 */
class Exercise
{
	private $clase_id;
	private $nombre;
	private $estado;
	private $imagen;

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
			$strSql = "SELECT e.ejercicio_id,e.nombre,e.estado,te.nombre as tipo, e.video from ejercicio e INNER JOIN tipo_ejercicio  te ON te.tipo_ejercicio_id = e.tipo_ejercicio_id order by 1 ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getAllActive()
	{
		try {
			$strSql = "SELECT e.ejercicio_id,e.nombre,e.estado,te.nombre as tipo, e.video from ejercicio e INNER JOIN tipo_ejercicio  te ON te.tipo_ejercicio_id = e.tipo_ejercicio_id  where e.estado = 'Activo' order by 1 ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	

	public function getAllMusclesByExercise()
	{
		try {
			$strSql = " SELECT * FROM vw_musculos  ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	
	public function getAllMusclesByExerciseVideo($id)
	{
		try {
			$strSql = " SELECT * FROM vw_musculos where ejercicio_id = {$id} ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	public function musclesByExercise($id)
	{
		try {
			$strSql = " SELECT ejercicio_id,nombre FROM vw_musculos  where ejercicio_id = $id";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	

	public function newExercise($data)
	{
		try {
			$this->pdo->insert('ejercicio', $data);
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newDmuscles($arrayMuscles ,$lastIdMuscle)
	{
		try {

			foreach ($arrayMuscles as $muscle) {
                $data = [
                    'ejercicio_id' => $lastIdMuscle,
                    'musculo_id' => $muscle->id
				];

				$this->pdo->insert('detalle_musculo', $data);
			}
			
			return true;

		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function getLast()
	{
		try {
			$strSql = "SELECT MAX(ejercicio_id) as id from ejercicio";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function editExercise($data)
	{
		try {
			$strWhere = 'ejercicio_id=' . $data['ejercicio_id'];
			$this->pdo->update('ejercicio', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function deleteClass($data)
	{
		try {
			$strWhere = 'clase_id = ' . $data['id'];
			$this->pdo->delete('clase', $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getExerciseById($id)
		{
			try {
				$strSql = "SELECT * FROM ejercicio WHERE ejercicio_id = $id";
				$query = $this->pdo->select($strSql);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function edit($data)
		{
			try {
				$strWhere = 'ejercicio_id=' . $data['ejercicio_id'];
				$this->pdo->update('ejercicio', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}	
		public function deleteMuscleExercise($id)
		{
			try {
				$strWhere = 'ejercicio_id =' . $id;
				$this->pdo->delete('detalle_musculo', $strWhere);
				return true;
			} catch (PDOException $e) {
				return $e->getMessage();
			}
		}

		public function getMuscleByExercise($id)
		{
			try {
					$strSql = "SELECT m.musculo_id, m.nombre from detalle_musculo dm 
							inner join musculo m on m.musculo_id = dm.musculo_id
							where dm.ejercicio_id={$id}";
						
				$query = $this->pdo->select($strSql);
				return $query;
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}
	
	
}
