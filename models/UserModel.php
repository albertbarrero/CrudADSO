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

    public function getUsers(){
        $query = "SELECT * FROM " . $this->table;
        $stmt=$this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersByName($name){
        $query = "SELECT * FROM " . $this->table . " WHERE nombre LIKE ?";
        $stmt=$this->conn->prepare($query);
        $stmt->execute(['%' .$name . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsersByNumDocum($numero_documento){
        $query = "SELECT * FROM " . $this->table . " WHERE numero_documento=?";
        $stmt=$this->conn->prepare($query);
        $stmt->execute([$numero_documento]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar($document_number, $document_type, $name, $phone, $photo, $id){
        $query = "UPDATE " . $this->table . " SET numero_documento=?, tipo_documento=?, nombre=?, telefono=?, foto=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$document_number, $document_type, $name, $phone, $photo, $id]);
    }

    public function eliminar($document_number){
        $query = "DELETE FROM ".$this->table. " WHERE numero_documento=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$document_number]);
    }


}