<?php

# Classe e o nome da classe<?php
class Database{
    private $host = "localhost";
    private $db_name = "crud_poo";
    private $username = "root";
    private $password = "";
    private $port = '3307';
    public $conn;

    public function conectar(){
        $this ->conn = null;
        try{
           $this->conn = new PDO("mysql:host={$this->host};
           port={$this->port};dbname={$this->db_name}", $this->username, 
           $this->password);
            $this->conn->exec("set names utf8");

        }catch(PDOException $exception){
            echo "Erro na conexão:".$exception->getMessage();
        }
        return $this->conn;

    }
}
