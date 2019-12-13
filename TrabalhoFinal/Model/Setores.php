<?php

namespace Model;

use PDO;
use PDOException;
use Model\Database;

class Setores{
    
    private $idSetor;
    private $NomeSetor;


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidSetor($value) {
        $this->idSetor = $value;
    }

    function setNomeSetor($value) {
        $this->NomeSetor = $value;
    }




    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Setores`(`NomeSetor`) VALUES(:NomeSetor)");
            $stmt->bindParam(":NomeSetor", $this->NomeSetor);
  
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Setores` SET `NomeSetor` = :NomeSetor WHERE `idSetor` = :idSetor ");
            $stmt->bindParam(":idSetor", $this->idSetor);
            $stmt->bindParam(":NomeSetor", $this->NomeSetor);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Setores` WHERE `idSetor` = :idSetor");
        $stmt->bindParam(":idSetor", $this->idSetor);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Setores` WHERE 1");
        $stmt->execute();
        return $stmt;
    }

    public function delete(){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `Setores` WHERE `idSetor` = :idSetor ");
            $stmt->bindParam(":idSetor", $this->idSetor);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
}
}