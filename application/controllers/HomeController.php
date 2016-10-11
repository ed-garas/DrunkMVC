<?php
defined('CORE_PATH')or exit('no access');
class HomeController extends BaseController
{
    public function indexAction()
    {
        $metaData = array('title'=>'taitlas');
        $data = array(
            'hello'=>'Hello suckers',
            'meta'=>$this->view('home/meta', $metaData , true)
        );
        $this->view('layout', $data);
    }

    public function helloAction(){
        $this->response->setOutput('not found');
    }

}