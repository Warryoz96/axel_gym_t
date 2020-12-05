<?php

/**
 * Modelo de Usuario
 */
class Commentary
{
	private $comentario_id;
    private $tipo;
    private $descripcion;
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
			$strSql = "SELECT c.*, u.nombre from comentario c  INNER JOIN usuario u ON u.usuario_id = c.usuario_id";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newCommentary($data)
	{
		try {
			$this->pdo->insert('comentario', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}



	public function editCommentary($data)
	{
		try {
			$strWhere = 'comentario_id=' . $data['comentario_id'];
			$this->pdo->update('comentario', $data, $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
    }
    
    public function deleteCommentary($data)
	{
		try {
			$strWhere = 'comentario_id = ' . $data['id'];
			$this->pdo->delete('comentario', $strWhere);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	

	
	
}
