<?php

require_once 'vendor/autoload.php';

use BT3\Controllers\UserController;

$controller = new UserController();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'update':
        $controller->update($_POST['id']);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
}
