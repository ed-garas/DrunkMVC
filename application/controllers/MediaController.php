<?php
defined('CORE_PATH') or exit('no access');

class MediaController extends BaseController
{
    public function mediaAction()
    {
        $this->view('files');
    }

    public function fileAction(){
        FileHelper::fileCopy('files','media');
    }

    public function exAction(){
        FileHelper::fileExists('media', '1220991440vesaitemazeikosbfl.jpg');
    }

    public function delAction(){
        FileHelper::fileDelete('media', 'tatoo.jpg');
    }

    public function testAction(){
        //UploadHelper::upload('media');
    }

    public function fotoAction(){
        echo '<img src="'.UploadHelper::getMedia('media', '14199732_1777324929214563_6809088329830563210_n.jpg').'" />';
    }

}