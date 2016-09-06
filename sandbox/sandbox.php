<?php

/*class Bele{
    private $skaicius = 0;

    public function vienas(){
        echo (++$this->skaicius) . 'vienas';
        return $this;
    }

    public function du(){
        echo (++$this->skaicius) . 'du';
        return $this;
    }

    public function trys(){
        echo (++$this->skaicius) . 'trys';
        return $this;
    }

}

$obj = new Bele();

$obj->vienas();
$obj->du();
$obj->trys();

$obj->vienas()->du()->trys();*/


$arr = array('vienas', 2, 'trys');
$coo = false;
include 'template.php';

