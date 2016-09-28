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
        $params = array("laukelis2" => "Useris");
        $result = $this->db->insert("lentele1", $params);
        echo $result === false ? "Insert failed" : "Inserted $result records";
    }

    public function deleteAction($id)
    {
        $where = array("id" => $id);
        $result = $this->db->delete("lentele1", $where);
        echo $result === false ? "Deletion failed" : "Deleted $result records";
    }

    public function updateAction($id, $password)
    {
        $where = array("id" => $id);
        $params = array("laukelis2" => $password);
        $result = $this->db->update("lentele1", $params, $where);
        echo $result === false ? "Update failed" : "Updated $result records";
    }

    public function selectAction($id = null)
    {
        $where = !empty($id) ? array('id' => $id) : null;
        $result = $this->db->select("lentele1", $where);
        if ($result === false) {
            echo 'select failed';
        } else {
            var_dump($result);
        }
    }

}
