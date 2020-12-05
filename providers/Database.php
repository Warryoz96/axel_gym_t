<?php

class Database extends PDO
{
	private $driver = 'mysql';
	private $host = 'remotemysql.com';
	private $dbName = 'QYyImbPXFa';
	private $charset = 'utf8';
	private $user = 'QYyImbPXFa';
	private $password = 'snjXMWrl5A';

	public function __construct()
	{	
		//Sobrecarga al constructor  con cadena de conexion BD
		// Hacemos la conexion utilizando PDO pasando los parametros  definidos en la clase 
		try {
			// pasamos parametros
			parent::__construct("{$this->driver}:host={$this->host}; dbname={$this->dbName}; charset={$this->charset}", $this->user, $this->password);
			// Metodo de PDO para Manejar errores
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// Manejamos los errores de conexion
		} catch (PDOException $e) {
			echo "Conexión Fallida {$e->getMessage()}";
		}
	}
	// Resivimos el string del query, o array y utilizando la forma PDO::FETCH_OBJ para retornar el query como un objeto
	public function select($strSql, $arrayData = array(), $fetchMode = PDO::FETCH_OBJ)
	{
		//preapro la consulta
		$queryf = $this->prepare("SET lc_time_names = 'es_ES'");
		$queryf->execute();
		$query = $this->prepare($strSql);
		// Asigna parametros al query si llega como un array
		foreach ($arrayData as $key => $value)
			$query->bindParam(":$key", $value);
		// Verificamos si el  query se realizo 
		if (!$query->execute())
			echo "Error, la consulta no se realizó";
		else
		// Retornamos el query con los datos
			return $query->fetchAll($fetchMode);
	}
	// Resivimos la tabla y los datos que se van a almacenar
	public function insert($table, $data)
	{
		try {
			// ordenar de forma alfabetica un array con la funcion ksort
			ksort($data);
			// Elimina del array los indices  de controller y metodo 
			unset($data['controller'], $data['method']);
			/*
			Definimos los nombres de los campos y valores correspodientes
			1. Con la funcion implode(a,b) volvemos string el array con cada valor del array(recibe dos parametos, a.la separacion que tiene cada valor y b.el array),
				con la función array_keys() sacamos la claves del array para volverlas un string para la consulta
			2. Ejemplo: $array = [1,2,3,4];
				 $fieldNames = implode('`, `', array_keys($array)); quedaria un string asi:  "`0`,`1`,`2`" asi con cada una de las claves del array
				 */
			$fieldNames = implode('`, `', array_keys($data));
			// de la misma for pero para indicar los valores los valores 
			$fieldValues = ':' . implode(', :', array_keys($data));
			// preparamos la consulta, para evitar INJECCIONES SQL
			$strSql = $this->prepare("INSERT INTO $table (`$fieldNames`)VALUES ($fieldValues)");
			// CARGA DE LOS DATOS
			foreach ($data as $key => $value) {
				// le asignamos a la sentencia los pares de clave valor correspondiente,
				// para la consulta
				$strSql->bindValue(":$key", $value);
			}
			// Ejecutamos la consulta
			$strSql->execute();
			// Control de excepciones
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function update($table, $data, $where)
	{
		try {
			//Ordena alfabetica mente los datos
			ksort($data);
			// lista de los detalles que quiero modificar
			$fieldDetails=null;
			// nombre de los input
			foreach ($data as $key => $value) {
				$fieldDetails .= "`$key` =:$key,";
			}
			//Borro los espacios y las comas al final
			$fieldDetails = rtrim($fieldDetails, ',');
			
			$strSql = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
			// valores  de los input
			foreach ($data as $key => $value) {
				$strSql->bindValue(":$key", $value);
			}
			$strSql->execute();
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function delete($table, $where)
	{
		try {
			$this->exec("DELETE FROM $table WHERE $where");
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}
