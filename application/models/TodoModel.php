<?php defined('CORE_PATH') or exit('no access');

class TodoModel extends BaseModel
{
    public function getAll()
    {
        return $this->db->select('todo');
    }

    public function create($data)
    {
        if ($this->db->insert('todo', $data) === false) {
            return null;
        }
        $id = $this->db->insertId();
        return $this->db->select('todo', array('id' => $id))[0];
    }

    public function markAsDone($id)
    {
        return $this->db->update('todo', array('done' => 1), array('id' => $id));
    }

    public function deleteDone()
    {
        return $this->db->delete('todo', array('done' => 1));
    }
}
