<?php defined('CORE_PATH') or exit('no access');

class TodoController extends BaseController
{
    private $validator;
    private $todo;

    public function __construct(Request $request, BaseResponse $response)
    {
        parent::__construct($request, $response);
        $this->validator = FormValidator::getInstance();
        $this->todo = $this->model('todo');
    }

    public function indexAction()
    {
        $data = array(
            'todos' => $this->todo->getAll(),
        );
        $this->view('todo/index', $data);
    }

    public function createAction()
    {
        $errors = array();
        $data = $this->request->post();
        if ($this->validator->validate($data, 'todo/create', $errors)) {
            $todo = $this->todo->create($data);
            $this->response->setOutput($todo);
        } else {
            $this->response->setOutput($errors);
        }
    }

    public function doneAction($id)
    {
        $result = $this->todo->markAsDone($id);
        $this->response->setOutput($result ? "success" : "error");
    }

    public function clearAction()
    {
        $result = $this->todo->deleteDone();
        $this->response->setOutput($result ? "success" : "error");
    }
}
