<?php

require_once './models/TipDocumModel.php';
require_once './config/database.php';

class TipDocumController{
    private $db;
    private $tipDocumModel;

    public function __construct(){
        $database = new Database();
        $this->db = $database->getConnection();
        $this->tipDocumModel = new TipDocumModel($this->db);            
    }

    public function listTipDocum(){
        return $this->tipDocumModel->getTipDocum();
    }
}