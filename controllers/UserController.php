<?php
namespace app\controllers;

use app\models\User;

class UserController extends Controller {

    public function actionUser()
    {
//        $this->useLayout = false;
        $id = $_GET['id'];
        $user = User::getOne($id);
//        var_dump($user);
        echo $this->render("user", ['user' => $user]);
    }





}