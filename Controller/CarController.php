<?php


class CarController
{
    private $vehicleManager;


    public function __construct()
    {
        $this->vehicleManager = new VehicleManager();
    }


    public function allCarView()
    {
        $vehicles = $this->vehicleManager->getAllVehicles();
        require 'View/allCarsView.php';

    }

    public function carDetail($id)
    {
        $vehicle = $this->vehicleManager->getOneVehicle($id);

        if ($vehicle) {
            require 'View/carDetail.php';
        } else {
            header('Location: index.php?controller=error&action=not-found&message=vehicle-not-found');
        }


    }

//    error checking

    private function checkForm()
    {
        $errors = [];

        if (empty($_POST['brand'])) {
            $errors[] = 'Please add a brand';
        } else {
            $lastentered['brand'] = $_POST['brand'];
        }

        if (empty($_POST['model'])) {
            $errors[] = 'Please add the model';
        } else {
            $lastentered['model'] = $_POST['model'];
        }

        if (empty($_POST['fueltype'])) {
            $errors[] = 'Please add the fuel type';
        } else {
            $lastentered['fueltype'] = $_POST['fueltype'];
        }

        if (empty($_POST['horsepower'])) {
            $errors[] = 'Please add the horsepower';
        } else {
            $lastentered['horsepower'] = $_POST['horsepower'];
        }

        if (empty($_POST['price'])) {
            $errors[] = 'Please add the price';
        } else {
            $lastentered['price'] = $_POST['price'];
        }

        return $errors;
    }

    public function addSaleCars()
    {
//       Todo: Add settings for images
//        $errors = [];
        $lastentered = [];


        //  Make sure post is in uppercase
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->checkForm();
//              I added if to remove an error
            if ($_FILES['carImg']) {
                //image prerequisites
                $extension_upload = $_FILES['carImg']['type'];
                $authorizedExtentions = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
                $filename= '';

                if (($_FILES['carImg']['size'] > 600000)) {
                    $errors[] = 'The selected image it too large , please choose a smaller image';
                } else {
                    if (in_array($extension_upload, $authorizedExtentions))
                        $filename = uniqid() . '_' . basename($_FILES['carImg']['name']);
                    $imageUrl = move_uploaded_file($_FILES['carImg']['tmp_name'], 'images/car/' . $filename);
                }

            }
            if (empty($_POST['description'])) {
                $errors[] = 'Please add a description';
            } else {
                $lastentered['description'] = $_POST['description'];
            }

            if (count($errors) == 0) {
                $vehicle = new Vehicle($_POST['brand'], $_POST['model'], $_POST['fueltype'], $_POST['horsepower'],
                    $_POST['price'], $_POST['description'], $filename);
                $this->vehicleManager->addVehicle($vehicle);
                header('Location: index.php?controller=car&action=list');
                exit();
            }

        }
        require 'View/addCars.php';

    }


    public function deleteCar($id)
    {
        $vehicle = $this->vehicleManager->getOneVehicle($id);

        if ($vehicle != null) {
            $this->vehicleManager->delete($vehicle);
            header('Location: index.php?controller=car&action=list');
        } else {
            header('Location: index.php?controller=error&action=not-found&message=vehicle-not-found');
        }

    }

    public function editCar($id)
    {
        $errors = [];
        $vehicle = $this->vehicleManager->getOneVehicle($id);


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->checkForm();


            if (count($errors) == 0) {

                $vehicle = new Vehicle($_POST['brand'], $_POST['model'], $_POST['fueltype'], $_POST['horsepower'],
                    $_POST['price'], $_POST['description'], $_POST['image'], $vehicle->getId());


                $this->vehicleManager->updateCar($vehicle);

                header('Location: index.php?controller=car&action=list');
                exit();
            }

        }
        require 'View/editCar.php';

    }


    public function uploadCar($id)
    {


    }
}