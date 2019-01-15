<?php

namespace app\interfaces;

interface IModel
{
    static function getOne(int $id);

    static function getAll();

    static function getTableName():string;

//    public function delete($id);
}