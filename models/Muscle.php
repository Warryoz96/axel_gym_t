<?php

/**
 * Modelo de Usuario
 */
class Muscle
{
	private $musculo_id;
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
			$strSql = "SELECT * from musculo";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}



	public function newMuscle($data)
	{
		try {
			$this->pdo->insert('musculo', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function editMuscle($data)
	{
		try {
			$strWhere = 'musculo_id= ' . $data["musculo_id"];
			$this->pdo->update('musculo', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
    
    
    
    public function deleteMuscle($data)
	{
		try {
			$strWhere = 'musculo_id = ' . $data;
			 $res = $this->pdo->delete('musculo', $strWhere);
			 return $res;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function VerifyName($nombre)
    {
        try {
            $strSql = "SELECT * from musculo where nombre='{$nombre}' ";
            $query = $this->pdo->select($strSql);
			if(isset($query[0]->nombre)):
				$res= ['success'=> false];
				return $res;
			else:
				$res= ['success'=> true];
				return $res;			
			endif;           
		   } catch (PDOException $e) {
            die($e->getMessage());
        }
	}
}
	
	

