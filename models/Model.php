<?php
namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

abstract class Model implements IModel
{
    protected $db;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne(int $id)         // передаем 3
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [":id" => $id]);       //подставляем 3 в плейсхолдер в запросе $sql
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} ";
        return $this->db->queryAll($sql);
    }

    public function insert()
    {
        $name = $this->getName();
        $info = $this->getInfo();
        $price = $this->getPrice();
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName}(name, info, price) 
                VALUES ('$name','$info','$price')";
        return $this->db->execute($sql);
    }

    public function delete($id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $id]);
    }

    public function update($id)
    {
        $name = $this->getName();
        $info = $this->getInfo();
        $price = $this->getPrice();
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} 
                SET name='$name',info='$info',price='$price' WHERE id = :id";
        return $this->db->execute($sql, [":id" => $id]);
    }
}


























