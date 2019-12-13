<?php

namespace Model;

use PDO;
use PDOException;

class Database
{
    private $host = "localhost";
    private $db_name = "trabalho";
    private $username = "root";
    private $password = "";
    public $conn;
    public function dbSet()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name.";charset=utf8", $this->username, $this->password, );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
              echo "Erro na conexão com o banco de dados: " . $exception->getMessage();
        }
        return $this->conn;
    }
    public static function prepare($sql){
        return self::dbSet()->prepare($sql);
    }
}
?>