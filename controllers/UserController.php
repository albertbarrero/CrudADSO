<?php

require_once './models/UserModel.php';
require_once './config/database.php';

class UserController{
    private $db;
    private $userModel;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->userModel = new UserModel($this->db);
    }
    
    public function insertUser(){
        if ($_SERVER["REQUEST_METHOD"] = "POST"){
                $document_number = $_POST['numero_documento'];
                $document_type = $_POST['tipo_documento'];
                $name = $_POST['nombre'];
                $phone = $_POST['telefono'];

                $photo = $_FILES['foto']['name'];
                $target_dir = "photo/";
                $target_file = $target_dir . basename($photo);
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);

                $this->userModel->insertUser($document_number, $document_type, $name, $phone, $photo);
                header("Location: index.php?action=dashboard");
        }
    }

    public function listUsers(){
        return $this->userModel->getUsers();
    }

    public function UserByName(){
        $name = $_GET['name'] ?? '';
        return $this->userModel->getUsersByName($name);
    }

    public function UserByNumDocum(){
        $numero_documento=$_GET['numero_documento'] ?? "";
        $datosUsuario = $this->userModel->getUsersByNumDocum($numero_documento);
        return $this->userModel->getUsersByNumDocum($numero_documento);
    }

    public function actualizar(){
        if ($_SERVER["REQUEST_METHOD"] = "POST"){
                $document_number = $_POST['numero_documento'];
                $document_type = $_POST['tipo_documento'];
                $name = $_POST['nombre'];
                $phone = $_POST['telefono'];

                $photo = $_FILES['foto']['name'] ? $_FILES['foto']['name'] : null;

                if ($photo){
                $target_dir = "photo/";
                $target_file = $target_dir . basename($photo);
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
                }else{
                    $photo = $_POST['foto_actual'];
                }

                $id=$_POST['id'];

                $this->userModel->actualizar($document_number, $document_type, $name, $phone, $photo, $id);
                
        }
    }

    public function eliminar(){
        $numero_documento = $_GET['numero_documento'] ?? '';
        $datosUsuario = $this->userModel->eliminar($numero_documento);
        return $this->userModel->eliminar($numero_documento);
    }

}