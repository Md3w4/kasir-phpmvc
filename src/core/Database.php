<?php

class Database
{
    private $conn;
    private $tableName;
    private $column = [];

    public function __construct()
    {
        $this->conn = $this->setConnection();
    }

    protected function setConnection()
    {
        try {
            $host = DB_HOST;
            $user = DB_USER;
            $pass = DB_PASS;
            $db = DB_NAME;
            $port = DB_PORT;
            $conn = new PDO("mysql:host=$host;dbname=$db;port=$port", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

    public function setColumn($column)
    {
        $this->column = $column;
    }

    public function qry($query, $params = [])
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    public function get($params = array(), $logic = 'AND')
    {
        $column = implode(",", $this->column);
        $query = "SELECT $column FROM {$this->tableName}";
        $paramValue = [];

        if (!empty($params)) {
            $query .= " WHERE 1=1 ";
            foreach ($params as $key => $value) {
                $query .= " {$logic} {$key} = ? ";
                array_push($paramValue, $value);
            }
        }

        return $this->qry($query, $paramValue);
    }

    public function insertData($data = array())
    {
        if (empty($data)) {
            return false;
        }
        $columnValue = [];
        $column = [];
        $param = [];
        foreach ($data as $key => $value) {
            array_push($column, $key);
            array_push($columnValue, $value);
            array_push($param, "?");
        }
        $column = implode(", ", $column);
        $param = implode(", ", $param);
        $query = "INSERT INTO {$this->tableName} ($column) VALUES ($param)";
        return $this->qry($query, $columnValue);
    }

    public function updateData($data = array(), $param = array())
    {
        if (empty($data)) {
            return false;
        }
        $columnValue = [];
        $kolom = [];
        $query = "UPDATE {$this->tableName} ";
        foreach ($data as $key => $value) {
            array_push($kolom, $key . "= ? ");
            array_push($columnValue, $value);
        }
        $kolom = implode(", ", $kolom);
        $query = $query . " SET $kolom WHERE 1=1 ";
        $whereColumn = [];
        foreach ($param as $key => $value) {
            array_push($whereColumn, "AND {$key} = ?");
            array_push($columnValue, $value);
        }
        $whereColumn = implode(", ", $whereColumn);
        $query = $query . $whereColumn;
        return $this->qry($query, $columnValue);
    }

    public function deleteData($param = array())
    {
        if (empty($param)) {
            return false;
        }
        $query = "DELETE FROM {$this->tableName} WHERE 1=1 ";
        $whereColumn = [];
        $columnValue = [];
        foreach ($param as $key => $value) {
            array_push($whereColumn, "AND {$key} = ?");
            array_push($columnValue, $value);
        }
        $whereColumn = implode(",", $whereColumn);
        $query = $query . $whereColumn;
        return $this->qry($query, $columnValue);
    }
}
