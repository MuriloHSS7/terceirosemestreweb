<?php
class Usuario {
    private $conn;
    private $table = "usuarios";

    public $id;
    public $nome;
    public $email;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function criar() {
        $query = "INSERT INTO " . $this->table . " (nome, email) VALUES (:nome, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        return $stmt->execute();
    }

    public function atualizar() {
        $query = "UPDATE " . $this->table . " SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

  public function deletar() {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $this->id);
    return $stmt->execute();
}
}