<?php
session_start();

require_once './models/UserModel.php';
require_once './config/database.php';
require_once './libs/fpdf186/fpdf.php';

class UserController
{
    private $db;
    private $userModel;

    // public function dashboard()
    // {
    //     require './views/dashboard.php'; // Carga la vista principal con los botones
    // }

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new UserModel($this->db);
    }

    public function insertUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $document_number = $_POST['numero_documento'];
            $document_type = $_POST['tipo_documento'];
            $name = $_POST['nombre'];
            $phone = $_POST['telefono'];

            $photo = $_FILES['foto']['name'];
            $target_dir = "photo/";
            $target_file = $target_dir . basename($photo);
            move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

            $this->userModel->insertUser($document_number, $document_type, $name, $phone, $photo);
        }
    }   

    public function listUsers()
    {
        return $this->userModel->getUsers();
    }

    public function UsersByName()
    {
        $name = $_GET['name'] ?? '';
        return $this->userModel->getUsersByName($name);
    }

    public function UserByNumDocum()
    {
        $numero_documento = $_GET['numero_documento'] ?? '';
        // $datosUsuario = $this->userModel->getUserByNumDocum($numero_documento);
        return $this->userModel->getUserByNumDocum($numero_documento);
    }

    public function actualizar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $document_number = $_POST['numero_documento'];
            $document_type = $_POST['tipo_documento'];
            $name = $_POST['nombre'];
            $phone = $_POST['telefono'];

            $photo = $_FILES['foto']['name'] ? $_FILES['foto']['name'] : null;

            if ($photo) {
                $target_dir = "photo/";
                $target_file = $target_dir . basename($photo);
                move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
            } else {
                $photo = $_POST['foto_actual']; // Mantener la foto actual
            }

            $id = $_POST['id'];

            $this->userModel->actualizar($document_number, $document_type, $name, $phone, $photo, $id);
        }
    }

    public function eliminar()
    {
        $numero_documento = $_GET['numero_documento'] ?? '';
        $datosUsuario = $this->userModel->eliminar($numero_documento);
        return $this->userModel->eliminar($numero_documento);
    }

    public function login1()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->login1($email, $password);

            if ($user) {
                $_SESSION['rol'] = $user['rol'];
                $_SESSION['nombre'] = $user['nombre'];
                if ($user['rol'] == "admin" || $user['rol'] == "empleado") {
                    header("Location: index.php?action=dashboard");
                }
                exit();
            } else {
                header("Location: index.php?action=login");
            }
        }
    }


    

    public function generarPDF()
    {
        $user = $this->userModel->getUsers();

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);

        $pdf->Cell(185, 10, 'Reporte de Usuarios', 1, 1, 'C'); //(ancho de celda, alto, 'texto', borde, salto de linea, alineación)
        $pdf->Ln(5);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Documento', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Tipo', 1);
        $pdf->Cell(40, 10, 'Nombre', 1);
        $pdf->Cell(40, 10, 'Telefono', 1);
        $pdf->Cell(45, 10, 'Foto', 1);
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 12);
        foreach ($user as $usuario) {
            $pdf->Cell(40, 10, $usuario['numero_documento'], 1);
            $pdf->Cell(20, 10, $usuario['tipo_documento'], 1);
            $pdf->Cell(40, 10, $usuario['nombre'], 1);
            $pdf->Cell(40, 10, $usuario['telefono'], 1);
            $ruta_foto = 'photo/' . $usuario['foto'];
             if (file_exists($ruta_foto) && !empty($usuario['foto'])) {
                $pdf->Cell(45, 10, $pdf->Image($ruta_foto, $pdf->GetX(), $pdf->GetY(), 10, 10), 1, 1, 'C');
             } else {
                 $pdf->Cell(45, 10, 'No disponible', 1, 1, 'C');
             }
            $pdf->Ln();
        }

        ob_clean();

        $pdf->Output('D', 'Reporte_Usuarios.pdf');
    }

    public function logOut()
    {
        session_unset();
        session_destroy();
        header("Location: index.php?action=login");
    }
}
