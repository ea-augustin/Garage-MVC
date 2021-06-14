<?php


class VehicleManager extends DatabaseConnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllVehicles()
    {
        //We use the following table to store parts of our results,because they are returned as objects
        $vehicleTable = [];
        $query = $this->database->prepare("SELECT * FROM vehicle");
        $query->execute();
        $results = $query->fetchAll();
        //Here we break down the object into tables
        foreach ($results as $result) {
            $vehicleTable[] = new Vehicle($result['brand'], $result['model'], $result['fueltype']
                , $result['horsepower'], $result['price'], $result['description'], $result['image'], $result['id']);
        }

        return $vehicleTable;

    }


    public function getOneVehicle($id)
    {
        $vehicle = null;
        $query = $this->database->prepare('SELECT * FROM vehicle WHERE id = :id');
        $query->execute(['id' => $id]);
        $results = $query->fetch();
        if ($results) {
            $vehicle = new Vehicle($results['brand'], $results['model'], $results['fueltype'], $results['horsepower']
                , $results['price'], $results['description'], $results['image'], $results['id']);
        }
        return $vehicle;

    }


    public function delete(Vehicle $vehicle)
    {

        $query = $this->database->prepare('DELETE FROM vehicle WHERE id = :id');
        $query->execute([
            'id' => $vehicle->getId()
        ]);
    }


    public function addVehicle(Vehicle $vehicle)
    {
        $query = $this->database->prepare('INSERT INTO vehicle  (brand,model,fueltype,horsepower,price,description,image) 
                                       VALUES (:brand,:model,:fueltype,:horsepower,:price,:description,:image)');

        $query->execute([
            'brand' => $vehicle->getBrand(),
            'model' => $vehicle->getModel(),
            'fueltype' => $vehicle->getFueltype(),
            'horsepower' => $vehicle->getHorsepower(),
            'price' => $vehicle->getPrice(),
            'description' => $vehicle->getDescription(),
            'image' => $vehicle->getImage()


        ]);
    }

    public function updateCar(Vehicle $vehicle)
    {
        $query = $this->database->prepare("UPDATE vehicle SET brand = :brand,model = :model,fueltype = :fueltype,horsepower = :horsepower
                 ,price = :price,description = :description,image = :image WHERE id = :id");

        $query->execute([
            'brand' => $vehicle->getBrand(),
            'model' => $vehicle->getModel(),
            'fueltype' => $vehicle->getFueltype(),
            'horsepower'=> $vehicle->getHorsepower(),
            'price'=> $vehicle->getPrice(),
            'description'=>$vehicle->getDescription(),
            'image'=>$vehicle->getImage(),
            'id'=> $vehicle->getId()

        ]);
    }

}