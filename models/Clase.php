<?php

/**
 * Modelo de Usuario
 */
class Clase
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
			$strSql = "SELECT * from clase";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	
	

	public function newClass($data)
	{
		try {
			$this->pdo->insert('clase', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getLast()
	{
		try {
			$strSql = "SELECT MAX(usuario_id) as id from usuario";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function editUser($data)
	{
		try {
			$strWhere = 'usuario_id=' . $data['usuario_id'];
			$this->pdo->update('usuario', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function deleteClass($data)
	{
		try {
			$strWhere = 'clase_id = ' . $data;
			$res= $this->pdo->delete('clase', $strWhere);
			return $res;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function VerifyClase($clase)
    {
        try {
            $strSql = "SELECT * from clase where nombre='{$clase}' ";

            $query = $this->pdo->select($strSql);

			if(isset($query[0]->nombre)):
				$res= ['success'=> false];
				return $res;
			else:
				$res= ['success'=> true];
				return $res;			
			endif;      			 
        } catch (PDOException $e) {
            return $e->getMessage();
        }    
	}
	public function checkTimeInstructor($datos)
    {
        try {
            $strSql = "SELECT * from horario h  where usua_id='{$datos["usua_id"]}' 
			and dia ='{$datos["dia"]}' and hora_inicio = '{$datos["inicio"]}' and hora_final = '{$datos["fin"]}' ";

            $query = $this->pdo->select($strSql);

			if(isset($query[0]->hora_inicio)):
				return false;
			else:
				return true;			
			endif;      			 
        } catch (PDOException $e) {
            return $e->getMessage();
        }    
	}

	public function getTimes(){
		try{
			$strSql ="SELECT concat(c.nombre,' Instructor ', u.nombre,u.apellido) as title, concat(h.dia,'T',h.hora_inicio) as `start`,  concat(h.dia,'T',h.hora_final) as `end` from clase c inner join horario h on h.clase_id=c.clase_id inner join usuario u on u.usuario_id=h.usua_id";
			$query = $this->pdo->select($strSql);
			return $query;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}

	public function getTimesIns(){
		try{
			$strSql ="SELECT concat(c.nombre,' Instructor ', u.nombre,u.apellido) as title, concat(h.dia,'T',h.hora_inicio) as `start`,  
			concat(h.dia,'T',h.hora_final) as `end` from clase c 
			inner join horario h on h.clase_id=c.clase_id
		inner join usuario u on u.usuario_id=h.usua_id where h.usua_id = '{$_SESSION["user"]->usuario_id}' ";
			$query = $this->pdo->select($strSql);
			return $query;
		}catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	

	
	
}
