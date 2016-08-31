<?php


class BirdController extends BaseController
{
    public function indexAction(){
        echo 'indexas';
    }

    public function bybisAction($x, $y){
        $sum = $x + $y;
        echo "sum: $x + $y = " . $sum;
    }

}