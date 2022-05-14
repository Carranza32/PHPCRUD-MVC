<?php

class Controller{
    public function __construct() {
        $this->view = new View();
    }

    public function loadModel($model)
    {
        $url = "Models/{$model}.php";

        if (file_exists($url)) {
            require $url;

            $modelName = $model;
            $this->model = new $modelName();
        }
    }
}

?>