<?php


include 'Components/header.php';
require 'include.php';


if (!isset($_GET['controller']) || !isset($_GET['action'])) {
    header("Location: index.php?controller=ad&action=list");
}


if ($_GET['controller'] == 'security') {
    if ($_GET['action']=='login'){
        $controller = new SecurityController();
        $controller->loginPage();
    }
    if ($_GET['action']=='register'){
        $controller = new SecurityController();
        $controller->registerPage();
    }
    if ($_GET['action']=='logout'){
        $controller = new SecurityController();
        $controller->log_out();
    }


}



if ($_GET['controller'] == 'car') {
      //secure the site
    if( empty($_SESSION) || !$_SESSION['user']){
        header("Location: index.php?controller=security&action=login");
    }
    if ($_GET['action']=='list'){
        $controller = new CarController();
        $controller->allCarView();
    }
    if ($_GET['action']=='add'){
        $controller = new CarController();
        $controller->addSaleCars();
    }
    if ($_GET['action']=='detail'){
        $controller = new CarController();
        $controller->carDetail();
    }
    if ($_GET['action']=='home'){
        $controller = new AdminController();
        $controller->adminDashboard();
    }


}

if ($_GET['controller'] == 'admin' && $_GET['action'] == 'manage') {
    $controller = new AdminController();
    $controller->adminManage();
}

if ($_GET['controller'] == 'user' && $_GET['action'] == 'profile') {
    $controller = new UserController();
    $controller->userProfile();
}

if ($_GET['controller'] == 'garage') {

    if ($_GET['action']=='list'){
        $controller = new GarageController();
        $controller->viewGarages();
    }
    if ($_GET['action']=='detail'){
        $controller = new GarageController();
        $controller->garageDetail();
    }

}

if ($_GET['controller'] == 'ad' ) {
    if ($_GET['action'] == 'list') {
        $controller = new AdvertController();
        $controller->adlist();
    }
    if ($_GET['action'] == 'detail') {
        $controller = new AdvertController();
        $controller->adDetail();
    }

}
