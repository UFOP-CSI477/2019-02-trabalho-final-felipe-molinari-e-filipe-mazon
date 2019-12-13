<?php

namespace Model;

use \PDO;
use \PDOException;
use Model\Database;

class Cargos{
    
    private $idCargo;
    private $NomeCar;
    private $Salario;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setIdCargo($value) {
        $this->idCargo = $value;
    }

    function setNomeCar($value) {
        $this->NomeCar = $value;
    }

    function setSalario($value) {
        $this->Salario = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Cargos`(`NomeCar`,`Salario`) VALUES(:NomeCar,:Salario)");
            $stmt->bindParam(":NomeCar", $this->NomeCar);
            $stmt->bindParam(":Salario", $this->Salario);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    
    public function edit(){
        try{
            $stmt = $this->conn->prepare("UPDATE `Cargos` SET `NomeCar` = :NomeCar, `Salario` = :Salario WHERE `idCargo` = :idCargo ");
            $stmt->bindParam(":idCargo", $this->idCargo);
            $stmt->bindParam(":NomeCar", $this->NomeCar);
            $stmt->bindParam(":Salario", $this->Salario);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }


	public function delete(){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `Cargos` WHERE `idCargo` = :idCargo ");
            $stmt->bindParam(":idCargo", $this->idCargo);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
}


    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Cargos` WHERE `idCargo` = :idCargo");
        $stmt->bindParam(":idCargo", $this->idCargo);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Cargos` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}