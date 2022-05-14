<?php
require_once './Services/Database.php';

class ProductosController extends Controller{
    function __construct()
    {
        parent::__construct();

        $this->view->data = [];

        $this->loadModel('ProductoModel');
    }

    public function index()
    {
        try {
            $this->view->data = $this->model->getAll();

            $this->view->render('Index');
        } catch (Exception $e) {
            $this->view->data = [];

            $this->view->render('Index');
        }
    }

    public function create()
    {
        try {
            $this->view->categories = $this->model->getCategories();

            $this->view->render('Create');
        } catch (Exception $e) {
            $this->view->categories = [];

            $this->view->render('Create');
        }
        
    }

    public function store()
    {
        $this->model->insert($_POST);

        header('Location: ' . $_SERVER['HTTP_REFERER']. '?message=Registro creado');
    }

    public function edit($param = null)
    {
        try {
            $this->view->product = $this->model->getProduct($param[0]);
            $this->view->categories = $this->model->getCategories();

            $this->view->render('Edit');
        } catch (Exception $e) {
            $this->view->product = [];
            $this->view->categories = [];

            $this->view->render('Edit');
        }        
    }

    public function update()
    {
        $this->model->update($_POST);

        header('Location: ' . $_SERVER['HTTP_REFERER']. '?message=Registro actualizado');
    }

    public function delete($data)
    {
        $this->model->destroy($data[0]);

        header('Location: ' . $_SERVER['HTTP_REFERER']. '?message=Registro eliminado');
    }
}