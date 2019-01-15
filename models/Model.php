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
/** @return static */
    public static function getOne(int $id)         
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, [":id" => $id], get_called_class())[0];       //подставляем 3 в плейсхолдер в запросе $sql
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} ";
        return Db::getInstance()->queryObject($sql, $params = [], get_called_class());
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
       return $this->db->execute($sql, [":id" => $this->id]);
    }

    public function insert()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {

            if ($key == 'db') {
                continue;
            }
            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $sql = "INSERT INTO {$tableName}({$columns}) VALUES ({$placeholders})";

        $this->db->execute($sql, $params);

        $this->id = $this->db->getLastInsetId();
        var_dump($this->id);
    }

    public function update()
    {
        $tableName = static::getTableName();

        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
//                        echo "{$key} = {$value}";
            if ($key == 'db') {
                continue;
            }
            $params[":{$key}"] = $value;
            $columns[] = "`{$key}`";
        }
//        var_dump($columns);
//        var_dump($params);
        $placeholders = array_keys($params);
//        var_dump($placeholders);

        $sql = "UPDATE {$tableName}
                SET {$columns[1]}={$placeholders[1]},{$columns[2]}={$placeholders[2]},
                 {$columns[3]}={$placeholders[3]}
                 WHERE id = :id";
        var_dump($sql);
        return $this->db->execute($sql, $params);

    }

    // UPDATE `goods` SET `id`=[value-1],`name`=[value-2],`info`=[value-3],
//`price`=[value-4] WHERE 1

    public function save()
    {

    }








//    public function update1($id)
//    {
//        $name = $this->getName();
//        $info = $this->getInfo();
//        $price = $this->getPrice();
//        $tableName = $this->getTableName();
//        $sql = "UPDATE {$tableName}
//                SET name='$name',info='$info',price='$price' WHERE id = :id";
//        return $this->db->execute($sql, [":id" => $id]);
//    }

    //    public function insert()
//    {
//        $name = $this->getName();
//        $info = $this->getInfo();
//        $price = $this->getPrice();
//        $tableName = $this->getTableName();
//        $sql = "INSERT INTO {$tableName}(name, info, price)
//                VALUES ('$name','$info','$price')";
//        return $this->db->execute($sql);
//    }

//    public function delete($id)
//    {
//        $tableName = $this->getTableName();
//        $sql = "DELETE FROM {$tableName} WHERE id = :id";
//        return $this->db->execute($sql, [":id" => $id]);
//    }
}


























