<?php

/**
 * Modelo de Usuario
 */
class User
{
	private $usuario_id;
	private $nombre;
	private $apellido;
	private $cedula;
	private $clave;
	private $correo;
	private $estado;
	private $telefono;
	private $fecha_creacion;
	private $rol_id;
	private $pdo;

	public function __construct()
	{
		try {
			$this->pdo = new Database;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function validateUser($data)
    {
        try {
            $strSql = "SELECT u.usuario_id, u.estado, u.nombre, u.apellido,u.rol FROM vw_usuarios u  inner join detalle_plan_gym dp on dp.usuario_id = u.usuario_id WHERE u.correo = '{$data['email']}' AND u.clave = '{$data['clave']}'";

            $query = $this->pdo->select($strSql);

            if(isset($query[0]->usuario_id)) {
                if($query[0]->estado == 'Activo') {
					session_start();	

					$_SESSION['user'] = $query[0];
					$_SESSION['nombre'] = $query[0]->nombre;
					$_SESSION['apellido'] = $query[0]->apellido;
					$_SESSION['rol'] = $query[0]->rol;
                    return true;
                } else {
                    return ' <b class="text-center" >Error al Iniciar Sesión <br>  Su Usuario esta Inactivo </b>';
                }
            } else {
                return '<b class="text-center">	Error al Iniciar Sesión.</b> <br>	<b>Verifique su usuario o contraseña<b>';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }    
	}
	public function validateEmail($email)
    {
        try {
            $strSql = "SELECT * from vw_usuarios where correo='{$email}' ";

            $query = $this->pdo->select($strSql);

            if(isset($query[0]->usuario_id)) {
                    return ["res" => true, "datos" => $query];
                } else {
                    return 'No hay un usuario asociado a este correo';
			 }
			 
        } catch (PDOException $e) {
            return $e->getMessage();
        }    
    }

	public function getAll()
	{
		try {
			$strSql = "SELECT * from vw_usuarios ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllInstructor()
	{
		try {
			$strSql = "SELECT * from vw_usuarios where rol = 'Instructor' ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getAllInstructorActivated()
	{
		try {
			$strSql = "SELECT * from vw_usuarios where rol = 'Instructor' and estado='Activo' ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function getAllClients()
	{
		try {
			$strSql = "SELECT * from vw_usuarios where rol = 'Cliente' ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function profile()
	{
		try {
			$strSql = "select u.nombre, u.apellido,u.cedula,u.correo,u.telefono, r.nombre as rol, u.estado from usuario as u INNER JOIN rol as r on r.rol_id=u.rol_id where usuario_id='{$_SESSION['user']->usuario_id}'";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	

	public function newUser($data)
	{
		try {
			$this->pdo->insert('usuario', $data);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function newPlan($data)
	{
		try {
			$this->pdo->insert('detalle_plan_gym', $data);
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
	
	public function getUserById($id)
		{
			try {
				$strSql = "SELECT * FROM usuario WHERE usuario_id = $id";
				$query = $this->pdo->select($strSql);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

    public function PlanByUser($id)
    {
        try {
            $strSql = " SELECT ejercicio_id,nombre FROM vw_musculos  where ejercicio_id = $id";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
	}
	public function VerifyEmail($email)
    {
        try {
		$strSql = " SELECT * from vw_usuarios where correo='{$email}'";
            $query = $this->pdo->select($strSql);
			if(isset($query[0]->correo)):
				$res= ['success'=> false];
				return $res;
			else:
				$res= ['success'=> true];
				return $res;			
			endif;      
		  } 
			catch (PDOException $e) {
            die($e->getMessage());
        }
	}
	public function VerifyPasword($clave)
    {
        try {
		$strSql = " SELECT * from vw_usuarios where clave='{$clave}' and usuario_id= '{$_SESSION["user"]->usuario_id}'";
            $query = $this->pdo->select($strSql);
			if(isset($query[0]->clave)):
				$res= ['success'=> true];
				return $res;
			else:
				$res= ['success'=> false];
				return $res;			
			endif;      
		  } 
			catch (PDOException $e) {
            die($e->getMessage());
        }
	}
	public function VerifyCedula($cedula)
    {
        try {
            $strSql = "SELECT * from vw_usuarios where cedula='{$cedula}' ";
            $query = $this->pdo->select($strSql);
			if(isset($query[0]->cedula)):
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
	public function changePassword($data)
	{
		try {
			$strWhere = 'usuario_id=' . $_SESSION['user']->usuario_id;
			$this->pdo->update('usuario', $data, $strWhere);
			return true;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function getAllSubs()
	{
		try {
			$strSql = "SELECT * FROM `suscripciones` ";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	
	
	
}


