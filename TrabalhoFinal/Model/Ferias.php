<?php

namespace Model;

use PDO;
use PDOException;
use Model\Database;

class Ferias{
    
    private $idFerias;
    private $DataInicio;
    private $DataFinal;
    private $Funcionarios_idFuncionario;


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidFerias($value) {
        $this->idSetor = $value;
    }

    function setDataInicio($value) {
        $this->DataInicio = $value;
    }
    function setDataFinal($value) {
        $this->DataFinal = $value;
    }
    function setFuncionarios_idFuncionario($value) {
        $this->Funcionarios_idFuncionario = $value;
    }




    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Ferias`(`DataInicio`,`DataFinal`,`Funcionarios_idFuncionario`) VALUES(:DataInicio,:DataFinal,:Funcionarios_idFuncionario)");
            $stmt->bindParam(":DataInicio", $this->DataInicio);
            $stmt->bindParam(":DataFinal", $this->DataFinal);
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