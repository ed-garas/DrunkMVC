<?php
defined('CORE_PATH') or exit('no access');

abstract class BaseModel
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

}
