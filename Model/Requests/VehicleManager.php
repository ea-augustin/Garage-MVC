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
                , $result['horsepower'], $result['price'], $result['description'],$result['image'],$result['id']);
        }

        return $vehicleTable;

    }


    public function getOneVehicle($id){
        $vehicle=null;
        $query = $this->database->prepare('SELECT * FROM vehicle WHERE id = :id');
        $query->execute(['id'=> $id]);
        $results= $query->fetch();
       if($results){
           $vehicle = new Vehicle($results['brand'],$results['model'],$results['fueltype'],$results['horsepower']
                                  ,$results['price'],$results['description'],$results['image'],$results['id']);
       }
       return $vehicle;

    }


     public function delete(Vehicle $vehicle){

       $query= $this->database->prepare('DELETE FROM vehicle WHERE id = :id');
       $query->execute([
           'id'=> $vehicle->getId()
       ]);
     }

}