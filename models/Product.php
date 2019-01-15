<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $info;
    public $price;

//    public $vendor_id;

    public static function getTableName():string
    {
        return 'goods';
    }
}