<?php


class Beers
{
    private $id;
    private $name;
    private $brewery;
    private $abv;
    private $description;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getBrewery()
    {
        return $this->brewery;
    }


    public function setBrewery($brewery)
    {
        $this->brewery = $brewery;
    }

    public function getAbv()
    {
        return $this->abv;
    }


    public function setAbv($abv)
    {
        $this->abv = $abv;
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
