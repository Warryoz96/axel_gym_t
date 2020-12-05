<?php

/**
 * Modelo de Usuario
 */
class TypeExercise
{
	private $tipo_ejercicio_id;
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
			$strSql = "SELECT * from tipo_ejercicio  ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	
	
}
