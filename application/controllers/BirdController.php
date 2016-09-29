<?php
defined('CORE_PATH') or exit('no access');

class BirdController extends BaseController
{
    private $bird;
    private $db;

    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
        $this->bird = $this->model('bird');
        $this->db = Database::getInstance();
    }

    public function indexAction()
    {
        echo 'bird';
    }

    public function swagAction()
    {
        echo $this->request->getUri();
    }

    public function yoloAction($a, $b)
    {
        echo UrlHelper::getBaseUrl();
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
        $params = array("title" => "pavadinimas2");
        $result = $this->db->insert("book", $params);
        echo $result === false ? "Insert failed" : "Inserted $result records";
    }

    public function deleteAction($id)
    {
        $where = array("id" => $id);
        $result = $this->db->delete("book", $where);
        echo $result === false ? "Deletion failed" : "Deleted $result records";
    }

    public function updateAction($id, $title)
    {
        $where = array("id" => $id);
        $params = array("title" => $title);
        $result = $this->db->update("book", $params, $where);
        echo $result === false ? "Update failed" : "Updated $result records";
    }

    public function selectAction($id = null)
    {
        $where = !empty($id) ? array('id' => $id) : null;
        $result = $this->db->select("book", $where);
        if ($result === false) {
            echo 'select failed';
        } else {
            var_dump($result);
        }
    }

    public function queryAction($title)
    {
        $params = array('title' => $title);
        $result = $this->db->query("INSERT INTO `book` (`title`) VALUES (:title)", $params);
        if ($result === false) {
            echo 'query failed';
        } else {
            var_dump($result);
        }
    }


    public function helpAction()
    {
        TestHelper::test();
    }
}
