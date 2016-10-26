<?php
defined('CORE_PATH')or exit('no access');
class DummyController extends BaseController
{
    public function indexAction()
    {
        echo "Snarglys";
    }

    public function displayAction($firstname, $lastname)
    {
        echo $firstname . $lastname;
    }

    public function before()
    {
        echo "Before executing action";
    }

    public function after()
    {
        echo "After executing action";
    }
}
