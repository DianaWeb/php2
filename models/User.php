<?php

namespace app\models;


class User extends Record
{
    public $id;
    public $login;
    public $password;
    public $name;

    public static function getTableName():string
    {
        return 'users';
    }
}