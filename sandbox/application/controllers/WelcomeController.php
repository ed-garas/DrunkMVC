<?php
defined('CORE_PATH') or exit('no access');

class WelcomeController extends BaseController
{
    private $validator;
    private $user;

    public function __construct(Request $request, BaseResponse $response)
    {
        parent::__construct($request, $response);
        $this->validator = FormValidator::getInstance();
        $this->user = $this->model('user');
    }

    public function indexAction()
    {
        $data = array();
        $this->view('welcome/index', $data);
    }

    public function loginAction()
    {
        $data = array();
        $this->view('welcome/login', $data);
    }

    public function registerAction()
    {
        $post = $this->request->post();
        if (empty($post)) { //jei ne post rodom forma
            $this->view('welcome/register');
            return;
        }
        //priesingu atveju validuojam forma
        $errors = array();
        if ($this->validator->validate($post, 'registration', $errors)) {
            $this->user->create($post);
            //redirect
            UrlHelper::redirect('login');
            return;
        }
        //jei forma nevalidi rodom forma su klaidom
        $data = array('errors' => $errors);
        $this->view('welcome/register', $data);
    }

    public function logoutAction()
    {
        //logout
    }

}
