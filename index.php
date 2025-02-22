<?php
require_once './controllers/UserController.php';
require_once './controllers/TipDocumController.php';

$userController = new UserController();
$TipDocumController = new TipDocumController();

$action = $_GET['action'] ?? 'login';
echo $action;
switch ($action) {

    case 'insertUser':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $users = $userController->insertUser();
            include './views/dashboard.php';
        } else {
            $docums = $TipDocumController->listTipDocum();
            include './views/insert_user.php';
        }
        break;

    case 'listUsers':
        if ($_SESSION["rol"] == "admin") {
            $users = $userController->listUsers();
            include './views/list_users.php';
        } else {
            include '../mvcFoto/views/dashboard.php';
        }
        break;

    case 'searchUserByName':
        $users = $userController->UsersByName();
        include './views/list_user_By_Name_Form.php';
        break;

    case 'openForm':
        $users = $userController->listUsers();
        include './views/list_user_By_Num_Docum.php';
        break;

    case 'searchUserByNumberDocument':
        $users = $userController->UserByNumDocum();
        $docums = $TipDocumController->listTipDocum();
        include './views/update_user.php';
        break;

    case 'actualizar':
        $users = $userController->actualizar();
        include './views/dashboard.php';
        break;

    case 'openFormDelete':
        $users = $userController->listUsers();
        include './views/delete_user_By_Num_Docum.php';
        break;

    case 'eliminar':
        $users = $userController->eliminar();
        include './views/dashboard.php';
        break;

    case 'dashboard':
        include './views/dashboard.php';
        break;

    case 'ingreso':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $users = $userController->login1();
        }
        break;

        case 'reporte':
            $users = $userController->generarPDF();
            break;

            
            
        case 'logOut':
                $users = $userController->logOut();
            break;
    default:
        include './views/login.php';
        break;
}
