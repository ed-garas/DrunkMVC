<?php

class DummyController extends BaseController
{
    public function indexAction()
    {
        echo 'ok';
    }

    public function displayAction($name , $surname){
        echo $name . ' ' . $surname;
    }

    public function before()
    {
        echo 'before actions';
    }

    public function after()
    {
        echo 'after actions';
    }
}