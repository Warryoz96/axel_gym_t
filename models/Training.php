<?php

/**
 * Modelo de Usuario
 */
class Training
{
	private $plan_id;
    private $nombre;
    private $tipo;
    private $objetivo;
	private $tiempo_sugerido;
    private $peso_inicial;
    private $peso_final;
	private $porcentaje_inicial;
	private $porcentaje_final;
	private $usuario_id;



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
			$strSql = "SELECT u.nombre as usuario, p.*  from plan_entrenamiento p inner join usuario u on u.usuario_id = p.usuario_id";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getPlans()
	{
		try {
			$strSql = "SELECT u.nombre as usuario, p.* from plan_entrenamiento p inner join usuario u on u.usuario_id = p.usuario_id
				where u.usuario_id={$_SESSION['user']->usuario_id}";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	

    public function getPlanById($id)
	{
		try {
			$strSql = "SELECT u.usuario_id, p.*  from plan_entrenamiento p inner join usuario u on u.usuario_id = p.usuario_id 
            where p.plan_id={$id}";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getRoutinesByPlan($id)
	{
		try {
			$strSql = "SELECT  r.rutina_id,r.nombre as rutina ,  DAYNAME(dp.dia) AS dia  
			from detalle_plan dp inner join rutina r on r.rutina_id = dp.rutina_id where dp.plan_id={$id} ";
					
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	public function getRoutinesByPlanWithoutName($id)
	{
		try {
			$strSql = "SELECT  r.rutina_id,r.nombre as rutina , dp.dia
			
			from detalle_plan dp inner join rutina r on r.rutina_id = dp.rutina_id where dp.plan_id={$id}";
					
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
    }
    
	
    
	public function new($data)
	{
		try {
			$this->pdo->insert('plan_entrenamiento',$data);
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newDetailsRoutines($arrayRoutines,$lastIdPlan)
	{
		try {

			foreach ($arrayRoutines as $routine) {

				$data = [
					
					'dia' => $routine['dia'],
					'rutina_id' => $routine['id'],
					'plan_id' => $lastIdPlan
					
				];
				$this->pdo->insert('detalle_plan', $data);
			}

			
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getLast()
	{
		try {
			$strSql = "SELECT MAX(plan_id) as id from plan_entrenamiento";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function edit($data)
	{
		try {
			$strWhere = 'plan_id=' . $data['plan_id'];
			$this->pdo->update('plan_entrenamiento', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

        public function deleteRoutinesPlan($id)
    {
        try {
            $strWhere = 'plan_id =' . $id;
            $this->pdo->delete('detalle_plan', $strWhere);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
        
    	
}
