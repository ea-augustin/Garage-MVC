<?php


class CarController
{
    public function allCarView()
    {
        require 'View/allCarsView.php';

    }

    public function carDetail()
    {
        require 'View/carDetail.php';

    }

    public function addSaleCars()
    {

        $errors = [];
        $lastentered =[];
//        Make sure post is in uppercase
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['brand'])) {
                $errors[] = 'Please add a brand';
            }else{
                $lastentered['brand'] = $_POST['brand'];
            }

            if (empty($_POST['model'])) {
                $errors[] = 'Please add the model';
            }else{
                $lastentered['model'] = $_POST['model'];
            }

            if (empty($_POST['fueltype'])) {
                $errors[] = 'Please add the fuel type';
            }else{
                $lastentered['fueltype'] = $_POST['fueltype'];
            }

            if (empty($_POST['horsepower'])) {
                $errors[] = 'Please add the horsepower';
            }else{
                $lastentered['horsepower'] = $_POST['horsepower'];
            }

            if (empty($_POST['price'])) {
                $errors[] = 'Please add the price';
            }else{
                $lastentered['price'] = $_POST['price'];
            }

            if (empty($_POST['description'])) {
                $errors[] = 'Please add a description';
            }else{
                $lastentered['description'] = $_POST['description'];
            }
            if (count($errors) == 0) {
                $vehicle = new Vehicle($_POST['brand'], $_POST['model'], $_POST['fueltype'], $_POST['horsepower'],
                    $_POST['price'], $_POST['description']);
                header('Location: index.php?controller=car&action=list');
                exit();
            }

        }
        require 'View/addCars.php';

    }
}