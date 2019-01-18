<?php
namespace app\controllers;

use app\models\Product;

class ProductController extends Controller {

    public function actionIndex()
    {
//        $this->useLayout = false;
        $products = Product::getAll();
//        var_dump($products);
        foreach ($products as $product) {
            echo $this->render("catalog", ['product' => $product]);
        }

    }

    public function actionCard()
    {
//        $this->useLayout = false;
        $id = $_GET['id'];
        $product = Product::getOne($id);
//var_dump($product);
        echo $this->render("card", ['product' => $product]);
//        var_dump(['product' => $product]);
    }




}