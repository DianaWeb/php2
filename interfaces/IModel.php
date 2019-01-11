<?php

namespace app\interfaces;

interface IModel
{
    function getOne(int $id);

    function getAll();

    function getTableName() : string ;

    public function getName():string;

    public function getInfo():string;

    public function getPrice():string;

    public function insert();

    public function delete($id);
}