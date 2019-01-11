<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $info;
    public $price;

//    public $vendor_id;

    public function getName():string
    {
        return $this->name;
    }

    public function getInfo():string
    {
        return $this->info;
    }

    public function getPrice():string
    {
        return $this->price;
    }

    public function getTableName():string
    {
        return 'goods';
    }
}