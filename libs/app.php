<?php

class App{
    public function __construct() {
        $url = $_GET['url'];
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        $archivoController = 'Controllers/' . $url[0] . '.php';

        if (file_exists($archivoController)) {
            require_once $archivoController;
            $controller = new $url[0];
            // $controller->loadModel($url[0]);

            $nparam = sizeof($url);

            if ($nparam > 1) {
                if ($nparam > 2) {
                    $param = [];

                    for ($i=2; $i < $nparam; $i++) { 
                        array_push($param, $url[$i]);
                    }

                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
            }
        }else{
            $controller = new Error();
        }
    }
}

?>