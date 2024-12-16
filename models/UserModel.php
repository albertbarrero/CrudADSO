<?php

class UserModel{
    private $conn;
    private $table = 'usuarios';

    public function __construct($db){
        $this->conn = $db;
    }
    
    public function insertUser($document_number, $document_type, $name, $phone, $photo){
        $query = "INSERT INTO " . $this->table . "(numero_documento, tipo_documento, nombre, telefono, foto) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$document_number, $document_type, $name, $phone, $photo]);
    }
}