<?php

namespace Model;

use \PDO;
use \PDOException;
use Model\Database;

class Advertencias{
    
    private $idAdvertencia;
    private $Motivo;
    private $Data;
    private $Funcionarios_idFuncionario;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidAdvertencia($value) {
        $this->idAdvertencia = $value;
    }

    function setMotivo($value) {
        $this->Motivo = $value;
    }

    function setData($value) {
        $this->Data = $value;
    }
    function setFuncionarios_idFuncionario($value) {
        $this->Funcionarios_idFuncionario = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Advertencias`(`Motivo`,`Data`,`Funcionarios_idFuncionario`) VALUES(:Motivo,:Data,:Funcionarios_idFuncionario)");
            $stmt->bindParam(":Motivo", $this->Motivo);
            $stmt->bindParam(":Data", $this->Data);
            $stmt->bindParam(":Funcionarios_idFuncionario", $this->Funcionarios_idFuncionario);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Advertencias` SET `Motivo` = :Motivo, `Data` = :Data");
            $stmt->bindParam(":idAdvertencia", $this->idAdvertencia);
            $stmt->bindParam(":Motivo", $this->Motivo);
            $stmt->bindParam(":Data", $this->Data);


            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Advertencias` WHERE `idAdvertencia` = :idAdvertencia");
        $stmt->bindParam(":idAdvertencia", $this->idAdvertencia);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Advertencias` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}