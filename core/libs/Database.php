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
        $action = explode(' ',trim($query));
        if($action[0] === 'SELECT'){
            $statement = $this->dbh->prepare($query);
            return $statement->execute() ? $statement->fetchAll($method) : false;
        }else {
            $statement = $this->dbh->prepare($query);
            return $statement->execute() ? $statement->rowCount() : false;
        }
    }

    public function select($table, $where = null) // Model name same as ucfirst($table)
    {
        $condition = $where ? $this->where($where) : 1;
        $statement = $this->dbh->prepare("SELECT * FROM `$table` WHERE $condition");
        return $statement->execute($where) ? $statement->fetchAll(PDO::FETCH_CLASS, ucfirst($table)) : false;
    }

    public function insert($table, $set)
    {
        $columns = $this->columns($set);
        $params = $this->params($set);
        $statement = $this->dbh->prepare("INSERT INTO `$table` ($columns) VALUES ($params)");
        return $statement->execute($set) ? $statement->rowCount() : false;
    }

    public function update($table, $set, $where = null) // if same column is in where and set it cause drunk error
    {
        $values = $this->values($set);
        $condition = $where ? $this->where($where) : 1;
        $statement = $this->dbh->prepare("UPDATE `$table` SET $values WHERE $condition");
        return $statement->execute(array_merge($set, $where)) ? $statement->rowCount() : false;
    }

    public function delete($table, $where = null) // if no $where value passed, when table will be cleaned
    {
        $condition = $where ? $this->where($where) : 1;
        $statement = $this->dbh->prepare("DELETE FROM `$table` WHERE $condition");
        return $statement->execute($where) ? $statement->rowCount() : false;
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

    private function values($arr)
    {
        return implode(',', array_map(function ($string) {
            return "`$string` = :$string";
        }, array_keys($arr)));
    }

    private function where($arr)
    {
        return implode(' AND ', array_map(function ($string) {
            return "`$string` = :$string";
        }, array_keys($arr)));
    }

    private function columns($arr)
    {
        return implode(',', array_map(function ($string) {
            return "`$string`";
        }, array_keys($arr)));
    }

    private function params($arr)
    {
        return implode(',', array_map(function ($string) {
            return ":$string";
        }, array_keys($arr)));
    }
}
