<?php
defined('CORE_PATH') or exit('no access');


class UserModel extends BaseModel
{
    public function create($data) {
        $data['password'] = md5($data['password']);
        $this->db->insert('user', $data);

    }
    
}
