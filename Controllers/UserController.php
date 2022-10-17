<?php
require_once './Services/Database.php';
require('./libs/fpdf/fpdf.php');

class UserController extends Controller{
    function __construct()
    {
        parent::__construct();

        if (empty($_SESSION["logged_user"])) {
            header('Location: http://localhost/phpcrud/LoginController/Index');
        }

        $this->view->data = [];

        $this->loadModel('UserModel');
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
            $this->view->render('Create');
        } catch (Exception $e) {
            $this->view->render('Create');
        }
        
    }

    public function store()
    {
        try {
            $this->model->insert($_POST);

            header('Location: ' . $_SERVER['HTTP_REFERER']. '?message=Registro creado');
        } catch (Throwable $th) {
            header('Location: ' . $_SERVER['HTTP_REFERER']. '?error_message=Error al crear');
        }
    }

    public function edit($param = null)
    {
        try {
            $this->view->product = $this->model->getUser($param[0]);

            $this->view->render('Edit');
        } catch (Exception $e) {
            $this->view->product = [];

            $this->view->render('Edit');
        }        
    }

    public function update()
    {
        try {
            $this->model->update($_POST);

            header('Location: ' . $_SERVER['HTTP_REFERER']. '?message=Registro actualizado');
        } catch (Exception $e) {
            header('Location: ' . $_SERVER['HTTP_REFERER']. '?error_message=Error al actualizar');
        }
    }

    public function delete($data)
    {
        try {
            $this->model->destroy($data[0]);

            header('Location: ' . $_SERVER['HTTP_REFERER']. '?message=Registro eliminado');
        } catch (Exception $e) {
            header('Location: ' . $_SERVER['HTTP_REFERER']. '?error_message=Error al eliminar');
        }
    }

    public function logout()
    {
        session_destroy();

        header('Location: http://localhost/phpcrud/LoginController/Index');
    }

    public function download_pdf()
    {
        try {
            $data = [];

            foreach ($this->model->getAll() as $key => $value) {
                $data[] = [
                    'name' => $value['name'],
                    'email' => $value['email'],
                    'created_at' => $value['created_at'],
                ];
            }

            $pdf = new PDF();

            $pdf->AliasNbPages();

            $pdf->AddPage('P', 'A3');

            $pdf->SetFont('Arial','',12);

            $header = array('Nombre', 'Email', 'Fecha creacion');

            $pdf->BasicTable($header, $data);                

            $pdf->Output('', 'DocPDFDWSL2022.pdf');
        } catch (Exception $th) {
            return $th->getMessage();
        }

        return;
    }
}


class PDF extends FPDF {
    // Cabecera de página
    function Header()
    {
        $this->SetFont('Helvetica','B', 20);
        // Título
        $this->Cell(0,10,'Lista de Usuarios',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Número de página
        $this->SetY(-15);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Tabla simple
    function BasicTable($header, $data)
    {
        // Cabecera
        foreach($header as $col)
            $this->Cell(50,7,$col,1,0, 'C');
        $this->Ln();
        // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(50,6,$col,1);
            $this->Ln();
        }
    }
}