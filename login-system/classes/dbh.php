<?php

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "root";
    private $dbName = "Bank";

    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }

    protected function select($query,$param) {
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($param);

        $result = $stmt->fetch();
        return $result;
    }

    # Query insert or delete can be use 
    protected function insert($query,$param) {
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($param);
    }

}



?>