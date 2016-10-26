<?php
defined('CORE_PATH')or exit('no access');
class HomeController extends BaseController
{
    public function indexAction()
    {
        $data = array(
            'hello'=>'Drunk MVC by drunk people'
        );
        $this->view('index', $data);
    }

}