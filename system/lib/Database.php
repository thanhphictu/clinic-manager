<?php

namespace lib;

use PDO;

class Database extends PDO
{
    public function __construct($connect, $user, $pass)
    {
        parent::__construct($connect, $user, $pass);
    }
    public function select($table)
    {
        $sql = 'SELECT * FROM `' . $table;
        $statement = $this->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    public function selectById($table, $id)
    {
        $sql = 'SELECT * FROM ' . $table . ' WHERE id = :id';
        $statement = $this->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetchAll();
    }
    // end select

    public function createUser($table, $data)
    {
        // echo $table;
        // print_r($data);
        $key = implode(",", array_keys($data));
        $bindKey = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ( $key ) VALUES ($bindKey)";
        echo $sql;
        $statement = $this->prepare($sql);
        foreach ($data as $key => &$value) {
            $statement->bindParam(':' . $key, $value);
        }
        return $statement->execute();
    }
    // end create

    // end update

    public function deleteById($table, $id)
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE id = :id';
        $statement = $this->prepare($sql);
        $statement->bindParam(":id", $id);
        return $statement->execute();
    }

    // end delete
}
