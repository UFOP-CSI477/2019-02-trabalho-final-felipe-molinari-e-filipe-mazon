<?php

namespace Model;

use \PDO;
use \PDOException;

class Funcionarios {
    
    private $idFuncionario;
    private $Nome;
    private $Endereco;
    private $Nascimento;
    private $CPF;
    private $Cargos_idCargo;
    private $Dependentes_idDependentes;
    private $Status;
    private $Advertencias_idAdvertencia;
    private $Setores_idSetor;
 


    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    
    function setidFuncionario($value) {
        $this->idFuncionario = $value;
    }

    function setNome($value) {
        $this->Nome = $value;
    }

    function setEndereco($value) {
        $this->Endereco = $value;
    }

    function setNascimento($value) {
        $this->Nascimento = $value;
    }

    function setCPF($value) {
        $this->CPF = $value;
    }
    function setCargos_idCargo($value) {
        $this->Cargos_idCargo = $value;
    }
    function setStatus($value) {
        $this->Status = $value;
    }
    function setSetores_idSetor($value) {
        $this->Setores_idSetor = $value;
    }





    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `Funcionarios`(`Nome`,`Endereco`,`Nascimento`,`CPF`,`Cargos_idCargo`,`Status`,`Setores_idSetor`) VALUES(:Nome,:Endereco,:Nascimento,:CPF,:Cargos_idCargo,:Status,:Setores_idSetor)");
            $stmt->bindParam(":Nome", $this->Nome);
            $stmt->bindParam(":Endereco", $this->Endereco);
            $stmt->bindParam(":Nascimento", $this->Nascimento);
            $stmt->bindParam(":CPF", $this->CPF);
            $stmt->bindParam(":Cargos_idCargo", $this->Cargos_idCargo);
            $stmt->bindParam(":Status", $this->Status);
            $stmt->bindParam(":Setores_idSetor", $this->Setores_idSetor);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            echo $e->getMessage();
            return 0;
        }             
    }
    

     public function delete(){
        try{
            $stmt = $this->conn->prepare("DELETE FROM `Funcionarios` WHERE `idFuncionario` = :idFuncionario ");
            $stmt->bindParam(":idFuncionario", $this->idFuncionario);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
    }




public function edit(){
        try{

            $stmt = $this->conn->prepare("UPDATE `Funcionarios` SET `Nome` = :Nome, `Endereco` = :Endereco, `Nascimento` = :Nascimento, `CPF` = :CPF, `Cargos_idCargo` = :Cargos_idCargo, `Dependentes_idDependentes` = :Dependentes_idDependentes, `Status` = :Status, `Advertencias_idAdvertencia` = :Advertencias_idAdvertencia, `Setores_idSetor` = :Setores_idSetor)");
            $stmt->bindParam(":Nome", $this->Nome);
            $stmt->bindParam(":Endereco", $this->Endereco);
            $stmt->bindParam(":Nascimento", $this->Nascimento);
            $stmt->bindParam(":CPF", $this->CPF);
            $stmt->bindParam(":Cargos_idCargo", $this->Cargos_idCargo);
            $stmt->bindParam(":Dependentes_idDependentes", $this->Dependentes_idDependentes);
            $stmt->bindParam(":Status", $this->Status);
            $stmt->bindParam(":Advertencias_idAdvertencia", $this->Advertencias_idAdvertencia);
            $stmt->bindParam(":Setores_idSetor", $this->Setores_idSetor);

            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0;
        }
        
    }



    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `Funcionarios` WHERE `idFuncionario` = :idFuncionario");
        $stmt->bindParam(":idFuncionario", $this->idFuncionario);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `Funcionarios` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}