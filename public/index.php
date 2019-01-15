<?php
include '../config/main.php';
include '../services/Autoloader.php';

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$product = \app\models\Product::getOne(152);
var_dump($product);

var_dump($product->delete());

//$asd = \app\models\Product::getAll();
//var_dump($asd);

$product->name = 'кепка';
$product->info = 'красивая';
$product->price = 100;

var_dump($product->update());

$good = new \app\models\Product();

$good->name = 'краски';
$good->info = 'яркие';
$good->price = 300;

//var_dump($good);
$good->insert();
//var_dump($good);




