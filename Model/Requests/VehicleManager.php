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
                , $result['horsepower'], $result['price'], $result['description'],$result['image']);
        }

        return $vehicleTable;

    }
}