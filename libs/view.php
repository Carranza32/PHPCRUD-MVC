<?php

class View{
    public function __construct() {
        
    }

    public function render($nombre)
    {
        require "Views/{$nombre}.php";
    }
}

?>