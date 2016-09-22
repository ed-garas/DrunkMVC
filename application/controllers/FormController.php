<?php
defined('CORE_PATH') or exit('no access');

class FormController extends BaseController
{
    public function indexAction(){
        $this->view('form'); 
    }
    
    public function sendAction(){
       FormValidator::getInstance()->validate($_POST, 'form/send');
    }
}
