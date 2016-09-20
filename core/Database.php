<?php
defined('CORE_PATH') or exit('no access');

class Database extends Singleton
{
    protected static $instance = null;

    private $dbh;

    protected function __construct()
    {
        $db = Config::getInstance()->database;

        try {
            $this->dbh = new PDO($db['dsn'], $db['username'], $db['password'], $db['options']);
        } catch (PDOException $e) {
            throw new DrunkException('Connection failed: ' . $e->getMessage());
        }
    }

    public function query($query, $method = PDO::FETCH_OBJ)
    {

    }

    public function select($table, $select = '*', $where = null)
    {
    }

    public function insert($table, $set = null)
    {
    }

    public function update($table, $set = null, $where = null)
    {
    }

    public function delete($table, $where = null)
    {
    }

    public function beginTransaction()
    {
        $this->dbh->beginTransaction();
    }

    public function commit()
    {
        $this->dbh->commit();
    }

    public function rollBack()
    {
        $this->dbh->rollBack();
    }

}
