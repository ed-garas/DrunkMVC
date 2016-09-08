<?php
defined('CORE_PATH')or exit('no access');
class BirdController extends BaseController
{

    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    public function swagAction()
    {
        echo $this->request->getUri();
    }

    public function yoloAction($x, $y)
    {
        echo "sum: $x + $y =" . ($x + $y);
    }
}
