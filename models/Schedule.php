<?php

/**
 * Modelo de Horarios
 */
class Schedule
{
	private $hora_id;
	private $dia;
	private $hora_inicio;
	private $hora_final;
	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new Database;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	
	public function getAll($id)
	{
		try {
			$strSql = "SELECT c.clase_id,h.hora_id , DATE_FORMAT(h.dia,'%d de %M %Y') AS dia ,TIME_FORMAT(h.hora_inicio, '%h: %i %p') as hora_inicio, TIME_FORMAT(h.hora_final, '%h: %i %p')  as hora_final,h.usua_id ,c.nombre as clase, u.nombre as instructor ,u.apellido as apellido from horario h INNER join clase as c on c.clase_id=h.clase_id 
			INNER join usuario as u on u.usuario_id=h.usua_id
			where c.clase_id={$id}";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllInstructorSchedule($id,$ins)
	{
		try {
			$strSql = "SELECT c.clase_id,h.hora_id , h.dia,h.hora_inicio, h.hora_final,h.usua_id ,c.nombre as clase, u.nombre as instructor ,u.apellido as apellido from horario h INNER join clase as c on c.clase_id=h.clase_id 
			INNER join usuario as u on u.usuario_id=h.usua_id where h.usua_id={$ins} and c.clase_id={$id}";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getSheduleById($id)
	{
		try {
			$strSql = "SELECT  c.clase_id,h.hora_id , h.dia,h.hora_inicio, h.hora_final,h.usua_id , u.nombre as instructor ,u.apellido as apellido from horario h INNER join clase as c on c.clase_id=h.clase_id 
			INNER join usuario as u on u.usuario_id=h.usua_id
			where h.hora_id={$id}";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	

	public function newSchedule($data)
	{
		try {
			$this->pdo->insert('horario', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	

	public function EditSchedule($data)
	{
		try {
			$strWhere = 'hora_id=' .$data['hora_id'];
			$this->pdo->update('horario', $data,$strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	

	public function deleteSchedule($data)
	{
		try {
			$strWhere = 'hora_id = ' . $data['id'];
			$this->pdo->delete('horario', $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}
    
   