<?php
    class Database{
        private $host = "localhost";
        private $db_name = "persona";
        private $username = "root";
        private $password = "";    
        public $conn;

        public function getConnection(){
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
                // echo "Estamos Conectados";
            }catch(PDOException $exception){
                echo "Error en la Conexion: ". $exception->getMessage();
            }
            return $this->conn;
        }
    }