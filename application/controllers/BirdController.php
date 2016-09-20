<?php
defined('CORE_PATH') or exit('no access');

class BirdController extends BaseController
{
    private $bird;

    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
        $this->bird = $this->model('bird');
    }

    public function swagAction()
    {
        echo $this->request->getUri();
    }

    public function yoloAction($a, $b)
    {
        echo "sum: $a + $b =" . $this->bird->sum($a, $b);
    }

    public function lolAction()
    {
        $count = Cookie::getInstance()->get('count', 0);
        Cookie::getInstance()->set('count', ++$count);
        echo $count;

    }

    public function insertAction()
    {
        $params = array("username" => "Useris", "password" => "aaa", "email" => "ada@gala.dev");
        $result = Database::getInstance()->insert("demo_app", $params);
        echo $result === false ? "Insert failed" : "Inserted $result records";
    }

    public function deleteAction($id)
    {
        $where = array("id" => $id);
        $result = Database::getInstance()->delete("demo_app", $where);
        echo $result === false ? "Deletion failed" : "Deleted $result records";
    }

    public function updateAction($id, $password)
    {
        $where = array("id" => $id);
        $params = array("password" => $password);
        $result = Database::getInstance()->update("demo_app", $params, $where);
        echo $result === false ? "Update failed" : "Updated $result records";
    }


}
