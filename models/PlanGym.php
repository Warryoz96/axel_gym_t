<?php


class PlanGym
{
    private $detalle_plan_gym_id;
    private $fecha_inicial;
    private $fecha_final;
    private $estado;
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
            $strSql = "   SELECT   dp.detalle_plan_gym_id, dp.usuario_id, DATE_FORMAT(dp.fecha_inicial,'%d de ' '%M ' '%Y') as fecha_inicial ,DATE_FORMAT(dp.fecha_final,'%d de %M %Y') as fecha_final  , dp.estado, u.usuario_id,u.nombre, u.apellido from usuario u  
            INNER join detalle_plan_gym dp  on dp.usuario_id=u.usuario_id
            where dp.usuario_id={$id} ";

            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }



    public function new($data)
    {
        try {
            $this->pdo->insert('detalle_plan_gym', $data);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function EditSchedule($data)
    {
        try {
            $strWhere = 'detalle_plan_gym_id=' .$data['detalle_plan_gym_id'];
            $this->pdo->update('detalle_plan_gym', $data,$strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    public function deletePlanGym($data)
    {
        try {
            $strWhere = 'detalle_plan_gym_id ='.$data;
            $this->pdo->delete('detalle_plan_gym', $strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}