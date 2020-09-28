<?php

// extende da classe PDO que já existe no php
// classe pdo que tem os comandos execute, prepare, etc...
class Sql extends PDO {
    // temos a conexão no escopo principal da classe
    private $conn;

    // quando a classe SQL for instanciada, ela precisa se conectar 
    // automaticamente ao banco de dados, por isso o construct.
    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
    }


    private function setParams($statement, $parameters = array()){
        foreach ($parameters as $key => $value){
            $this->setParam($key, $value);
        }
    }

    private function setParam($statement, $key, $value){
        $statement->bindParam($key, $value);
    }

    // a rawQuery, é uma query que será tratada.
    // query = comando SQL, ou consulta.
    public function query($rawQuery, $params = array()){
        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = array()):array{
        $stmt = $this->query($rawQuery, $params);

        // fetch = buscar, trazer
        // fetch_assoc = apenas dados associativos, sem indices
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
