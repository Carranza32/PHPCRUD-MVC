<?php
require_once './Services/Database.php';

class LoginController extends Controller{
    function __construct()
    {
        parent::__construct();

        $this->view->data = [];

        $this->loadModel('LoginModel');
    }

    public function index()
    {
        try {
            $this->view->render('Login');
        } catch (Exception $e) {
            $this->view->data = [];

            $this->view->render('Login');
        }
    }

    public function login()
    {
        $data = $this->model->login($_POST);
        
        if ($data != null) {
            $_SESSION["logged_user"] = $data;
            header('Location: http://localhost/phpcrud/UserController/Index');
        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. '?message=Credenciales erroneas');
        }

        
        try {
        } catch (Throwable $th) {
            echo $th->getMessage();
            header('Location: ' . $_SERVER['HTTP_REFERER']. '?error_message=Error al crear');
        }
    }

}