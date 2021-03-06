<?php
session_start();

include 'Components/header.php';
require 'include.php';


if (!isset($_GET['controller']) || !isset($_GET['action'])) {
    header("Location: index.php?controller=security&action=login");
}
//*************************************************************************
//Security
//*************************************************************************

if ($_GET['controller'] == 'security') {
    if ($_GET['action'] == 'login') {
        $controller = new SecurityController();
        $controller->loginPage();
    }
    if ($_GET['action'] == 'register') {
        $controller = new SecurityController();
        $controller->registerPage();
    }

    if ($_GET['action'] == 'logout') {
        $controller = new SecurityController();
        $controller->log_out();
    }

    if ($_GET['action'] == 'profiles') {
        $controller = new SecurityController();
        $controller->getAllUserProfiles();
    }

    if ($_GET['action'] == 'details') {
        $controller = new SecurityController();
        $controller->userDetails($_GET['id']);
    }

    if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
        $controller = new SecurityController();
        $controller->userDelete($_GET['id']);
    }
    if ($_GET['action'] == 'edit' && isset($_GET['id'])) {
        $controller = new SecurityController();
        $controller->userEdit($_GET['id']);
    }


}
//*************************************************************************
//Car
//*************************************************************************

if ($_GET['controller'] == 'car') {

    if (empty($_SESSION) || !$_SESSION['user']) {
        header("Location: index.php?controller=security&action=login");
    }

    if ($_GET['action'] == 'list') {
        $controller = new CarController();
        $controller->allCarView();
    }
    if ($_GET['action'] == 'add') {
        $controller = new CarController();
        $controller->addSaleCars();
    }
    if ($_GET['action'] == 'detail') {
        $controller = new CarController();
        $controller->carDetail($_GET['id']);
    }

    if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
        $controller = new CarController();
        $controller->deleteCar($_GET['id']);
    }
    if ($_GET['action'] == 'edit' && isset($_GET['id'])) {
        $controller = new CarController();
        $controller->editCar($_GET['id']);
    }
    if ($_GET['action'] == 'upload' && isset($_GET['id'])) {
        $controller = new CarController();
        $controller->uploadCar($_GET['id']);
    }

}

//*************************************************************************
//Admin
//*************************************************************************


if ($_GET['controller'] == 'admin') {

    $user = unserialize($_SESSION['user']);

    if (empty($_SESSION) || !$_SESSION['user']) {
        header("Location: index.php?controller=car&action=list");
    }

    if (!$user->isAdmin()) {
        header("Location: index.php?controller=car&action=list");
    } else {
        $controller = new AdminController();
        if ($_GET['action'] == 'dashboard') {
            $controller->adminDashboard();
        }
    }

    if ($_GET['action'] == 'manage' && isset($_GET['id'])) {
        $controller = new AdminController();
        $controller->adminManage();
    }

}


//*************************************************************************
//User
//*************************************************************************

if ($_GET['controller'] == 'user' && $_GET['action'] == 'profile') {
    if (empty($_SESSION) || !$_SESSION['user']) {
        header("Location: index.php?controller=security&action=login");
    }
    $controller = new UserController();
    $controller->userProfile();
}
//*************************************************************************
//Garage
//*************************************************************************
if ($_GET['controller'] == 'garage') {

    if ($_GET['action'] == 'list') {
        $controller = new GarageController();
        $controller->viewGarages();
    }
    if ($_GET['action'] == 'detail') {
        $controller = new GarageController();
        $controller->garageDetail();
    }


}

//*************************************************************************
//Adverts
//*************************************************************************
if ($_GET['controller'] == 'ad') {
    if ($_GET['action'] == 'list') {
        $controller = new AdvertController();
        $controller->adlist();
    }
    if ($_GET['action'] == 'detail') {
        $controller = new AdvertController();
        $controller->adDetail();
    }


}

if ($_GET['controller'] == 'error' && $_GET['action'] == 'not-found') {
    $controller = new ExceptionController();
    $controller->pageNotFound();
}
