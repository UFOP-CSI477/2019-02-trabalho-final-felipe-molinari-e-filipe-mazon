<?php

namespace Model;

use PDO;
use PDOException;
use Model\Database;

class Dependentes{
    
    private $idDependente;
    private $NomeDepDep;
    private $Funcionarios_idFuncionario;


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidDependente($value) {
        $this->idDependente = $value;
    }

    function setNomeDep($value) {
        $this->NomeDep = $value;
    }
    function setFuncionarios_idFuncionario($value) {
        $this->Funcionarios_idFuncionario = $value;
    }




    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Dependentes`(`NomeDep`,`Funcionarios_idFuncionario`) VALUES(:NomeDep,:Funcionarios_idFuncionario)");
            $stmt->bindParam(":NomeDep", $this->NomeDep);
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
            $stmt = $this->conn->prepare("UPDATE `Dependentes` SET `NomeDep` = :NomeDep,`Funcionarios_idFuncionario` = :Funcionarios_idFuncionario");
            $stmt->bindParam(":idDependente", $this->idDependente);
            $stmt->bindParam(":NomeDep", $this->NomeDep);
            $stmt->bindParam(":Funcionarios_idFuncionario", $this->Funcionarios_idFuncionario);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Dependentes` WHERE `idDependente` = :idDependente");
        $stmt->bindParam(":idDependente", $this->idDependente);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Dependentes` WHERE 1");
        $stmt->execute();
        return $stmt;
    }

    public function delete(){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `Dependentes` WHERE `idDependente` = :idDependente ");
            $stmt->bindParam(":idDependente", $this->idDependente);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
}
}