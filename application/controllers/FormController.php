<?php
defined('CORE_PATH') or exit('no access');

class FormController extends BaseController
{
    public function indexAction()
    {
        $this->view('form');
    }

    public function sendAction()
    {
        $errors = array();
        $isValid = FormValidator::getInstance()->validate($_POST, 'form/send', $errors);
        var_dump($isValid, $errors);
    }
}
