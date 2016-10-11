<?php
defined('CORE_PATH') or exit('no access');

class AjaxController extends BaseController
{
    public function indexAction(){
        $this->view('ajax/form');
    }

    public function sendAction(){
        $result = $this->request->post();
        $this->response->setOutput($result);
    }

}