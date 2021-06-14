<?php

spl_autoload_register(function ($className) {
    $directories = array(
        'Controller/',
        'Model/Class/',
        'Model/Requests/',
    );

    foreach($directories as $directory)
    {

        //see if the file exists
        if(file_exists($directory.$className . '.php'))
        {
            require_once($directory.$className . '.php');

            return;
        }
    }
});

















//
//
//require 'Model/Requests/DatabaseConnection.php';
//require 'Controller/CarController.php';
//require 'Controller/ExceptionController.php';
//require 'Controller/SecurityController.php';
//require 'Controller/AdminController.php';
//require 'Controller/AdvertController.php';
//require 'Controller/GarageController.php';
//require 'Controller/UserController.php';
//require 'Model/Class/Vehicle.php';
//require 'Model/Class/User.php';
//require 'Model/Requests/VehicleManager.php';
//require 'Model/Requests/UserManager.php';