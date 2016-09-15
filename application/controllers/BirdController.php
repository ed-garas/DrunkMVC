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
}
