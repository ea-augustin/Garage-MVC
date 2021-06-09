<?php


class Vehicle
{
  private $id;
  private $brand;
  private $model;
  private $fueltype;
  private $horsepower;
  private $price;
  private $description;


    public function __construct($brand, $model, $fueltype, $horsepower, $price, $description, $id=null)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->fueltype = $fueltype;
        $this->horsepower = $horsepower;
        $this->price = $price;
        $this->description = $description;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getBrand()
    {
        return $this->brand;
    }


    public function setBrand($brand)
    {
        $this->brand = $brand;
    }


    public function getModel()
    {
        return $this->model;
    }


    public function setModel($model)
    {
        $this->model = $model;
    }


    public function getFueltype()
    {
        return $this->fueltype;
    }


    public function setFueltype($fueltype)
    {
        $this->fueltype = $fueltype;
    }


    public function getHorsepower()
    {
        return $this->horsepower;
    }


    public function setHorsepower($horsepower)
    {
        $this->horsepower = $horsepower;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }



}