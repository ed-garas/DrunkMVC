<?php
defined('CORE_PATH')or exit('no access');

class DummyModel extends BaseModel
{
    public function getById($id){
        return $this->db->select('dummy', '*', array('id'=>$id));
    }
    
    public function getAll(){
        return $this->db->select('dummy');
    }
}
