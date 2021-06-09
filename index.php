<?php
include 'Components/header.php';
require 'include.php';


if (!isset($_GET['controller']) || !isset($_GET['action'])) {
    header("Location: index.php?controller=ad&action=list");
}


if ($_GET['controller'] == 'security' && $_GET['action'] == 'login') {
    $controller = new SecurityController();
    $controller->loginPage();
}

if ($_GET['controller'] == 'security' && $_GET['action'] == 'register') {
    $controller = new SecurityController();
    $controller->registerPage();
}


if ($_GET['controller'] == 'car' && $_GET['action'] == 'list') {
    $controller = new CarController();
    $controller->allCarView();
}

if ($_GET['controller'] == 'car' && $_GET['action'] == 'add') {
    $controller = new CarController();
    $controller->addSaleCars();
}

if ($_GET['controller'] == 'car' && $_GET['action'] == 'detail') {
    $controller = new CarController();
    $controller->carDetail();
}

if ($_GET['controller'] == 'admin' && $_GET['action'] == 'home') {
    $controller = new AdminController();
    $controller->adminDashboard();
}
if ($_GET['controller'] == 'admin' && $_GET['action'] == 'manage') {
    $controller = new AdminController();
    $controller->adminManage();
}

if ($_GET['controller'] == 'user' && $_GET['action'] == 'profile') {
    $controller = new UserController();
    $controller->userProfile();
}

if ($_GET['controller'] == 'garage' && $_GET['action'] == 'list') {
    $controller = new GarageController();
    $controller->viewGarages();
}

if ($_GET['controller'] == 'garage' && $_GET['action'] == 'detail') {
    $controller = new GarageController();
    $controller->garageDetail();
}
if ($_GET['controller'] == 'ad' && $_GET['action'] == 'detail') {
    $controller = new AdvertController();
    $controller->adDetail();
}

if ($_GET['controller'] == 'ad' && $_GET['action'] == 'list') {
    $controller = new AdvertController();
    $controller->adlist();
}


