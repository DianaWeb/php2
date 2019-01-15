<?php

namespace app\services;

class Autoloader {
    public $fileExtension = ".php";

    public function loadClass($className)
    {
        $className = str_replace(["app\\", "\\"],[ROOT_DIR, "/"], $className);
        $className .= $this->fileExtension;

        if (file_exists($className)) {
            include $className;
        }else{
            echo "Файл не найден";
        }
    }
}

// define("ROOT_DIR", $_SERVER['DOCUMENT_ROOT'] . "/../");

// define("DS", DIRECTORY_SEPARATOR); можно испоьзовать вместо "/"