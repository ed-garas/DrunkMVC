<?php

class BirdController extends BaseController
{
    public function swagAction() {
        echo "SWAG";
    }

    public function yoloAction($x, $y) {
        echo "sum: $x + $y =".($x+$y);
    }
}
