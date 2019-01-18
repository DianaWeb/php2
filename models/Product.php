<?php

namespace app\models;

class Product extends Record
{
    public $id;
    public $name;
    public $info;
    public $price;
//    public $vendor_id;
    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $info
     * @param $price
     */
    public function __construct($id = null, $name = null, $info = null, $price = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->info = $info;
        $this->price = $price;
    }

    public static function getTableName():string
    {
        return 'goods';
    }


}