<?php
include '../config/main.php';
include '../services/Autoloader.php';

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$product = new \app\models\Product();

var_dump($product->getOne(3));
var_dump($product->getAll());

$product->name = 'майка';
var_dump($product->name);       //майка
var_dump($product->getName());  // майка

$product->info = 'новая';
$product->price = '400';

var_dump($product->insert());

var_dump($product->delete(111));

$product->name = 'кофта';
$product->info = 'шерсть';
$product->price = '500';
var_dump($product->update(116));