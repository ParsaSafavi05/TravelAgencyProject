<?php
namespace App\Models;

use App\Http\Config;

class DB
{
    private static $instance = null;
    private static $connstr = null;
    private static $query;
    private static $table;

    private function __construct()
    {
    }
    public static function table($table)
    {
        self::$instance = new self;
        self::$table = $table;
        self::$connstr = mysqli_connect(Config::HOSTNAME, Config::USERNAME, Config::PASSWORD, Config::DBNAME);
        self::$query = 'select * from ' . self::$table;
        return self::$instance;
    }

    public function where($field, $opr, $data)
    {
        self::$query .= " where {$field} {$opr} '{$data}'";
        return $this;
    }

    public function and($field, $opr, $data)
    {
    self::$query .= " AND {$field} {$opr} '{$data}'";
    return $this;
    }


    public function get()
    {
        self::$query = mysqli_query(self::$connstr, self::$query);
        $result = [];
        while ($res = mysqli_fetch_assoc(self::$query)) {
            array_push($result, $res);
        }

        return json_encode($result);
    }

    public function getQuery()
    {

    return self::$query;

    }

    public function select($columns)
    {
        if (is_string($columns)) {
            self::$query = "SELECT $columns FROM ".self::$table;
        } 

        return $this;
    }

    public function selectdistinct($columns)
    {
        if (is_string($columns)) {
            self::$query = "SELECT DISTINCT $columns FROM ".self::$table;
        } 

        return $this;
    }

    public function value($column) {
        $result = $this->get($column);
        return $result ? $result[$column] : null;
    }

    public function create(array $field, array $data)
    {
        $field = implode(',', $field);
        $data = implode("','", $data);

        self::$query = "insert into " . self::$table . " ({$field}) values ('{$data}')";
        self::$query = mysqli_query(self::$connstr, self::$query);

        return true;
    }   

    public function delete($id)
    {
        self::$query = "delete from " . self::$table . " where id = {$id}";

        self::$query = mysqli_query(self::$connstr, self::$query);

        return true;
    }

    public function join($table, $firstColumn, $secondColumn, $alias = null)
    {
        $alias = $alias ? $alias : $table; // Use the table name as the alias if not provided
        self::$query .= " INNER JOIN {$table} AS {$alias} ON {$firstColumn} = {$secondColumn}";
        return $this;
    }

}
