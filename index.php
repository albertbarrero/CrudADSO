<?php

require_once './controllers/UserController.php';
require_once './controllers/TipDocumController.php';

$userController = new UserController();
$TipDocumController = new TipDocumController();

$action = $_GET['action'] ?? 'dashboard';

switch ($action) {
    case 'insertUser':
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $users=$userController->insertUser();
        }else{
            $docums = $TipDocumController->listTipDocum();
            include './views/insert_user.php';
        }
        break;

    case 'listUsers':
        $users = $userController->listUsers();
        include './views/list_users.php';
        break;

    case 'searchUserByName':
        $users = $userController->UserByName();
        include './views/list_user_By_Name_Form.php';
        break;

    case 'openForm':
        $users = $userController->listUsers();
        include './views/list_user_By_Num_Docum.php';
        break;

    case 'searchUserByNumberDocum':
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
        $users=$userController->eliminar();
        include './views/dashboard.php';
        break;
        
    default:
        include './views/dashboard.php';
        break;
}