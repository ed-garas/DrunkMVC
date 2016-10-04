<?php
defined('CORE_PATH') or exit('no access');

class MediaController extends BaseController
{
    public function mediaAction()
    {
        $this->view('files');
    }


    public function testAction(){
        FileHelper::upload('media');
    }

    public function fotoAction(){
        echo '<img src="'.FileHelper::getMedia('media', '14199732_1777324929214563_6809088329830563210_n.jpg').'" />';
    }

}