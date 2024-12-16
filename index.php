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

    default:
        include './views/dashboard.php';
        break;
}