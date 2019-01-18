<?php

namespace app\controllers;


abstract class Controller
{
    protected $action;
    protected $defaultAction = 'index';
    protected $layout = "main";
    protected $useLayout = true;

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if(method_exists($this, $method)){
            $this->$method();
        }else{
            echo "404";
        }
    }

    protected function render($template, $params = []){
//        var_dump($params);
//        var_dump($template);
        if($this->useLayout){

            return $this->renderTemplate(
                "layouts/{$this->layout}", ['content' =>  $this->renderTemplate($template, $params)]
            );
//            var_dump($this->renderTemplate($template, $params));           ошибка - недостижимый опратор
        }

        return $this->renderTemplate($template, $params);
    }

    protected function renderTemplate($template, $params = [])   {

        ob_start();
        $templatePath = TEMPLATES_DIR . $template . ".php";
//        var_dump($params);
        extract($params);   // из ['product' => $product] 'product' преобразуется в $product

        include $templatePath;
        return ob_get_clean();
    }

}