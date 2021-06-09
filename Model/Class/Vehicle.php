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
  private $image;

    /**
     * Vehicle constructor.
     * @param $brand
     * @param $model
     * @param $fueltype
     * @param $horsepower
     * @param $price
     * @param $description
     * @param $image
     */
    public function __construct($brand, $model, $fueltype, $horsepower, $price, $description, $image,$id=null)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->fueltype = $fueltype;
        $this->horsepower = $horsepower;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
        $this->id =$id;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getFueltype()
    {
        return $this->fueltype;
    }

    /**
     * @param mixed $fueltype
     */
    public function setFueltype($fueltype)
    {
        $this->fueltype = $fueltype;
    }

    /**
     * @return mixed
     */
    public function getHorsepower()
    {
        return $this->horsepower;
    }

    /**
     * @param mixed $horsepower
     */
    public function setHorsepower($horsepower)
    {
        $this->horsepower = $horsepower;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }




}