<?php

class Conexao {

    private $host = "localhost";
    private $db_name = "catalogo";
    private $username = "root";
    private $password = "bolacha";
    public $conn;

    // get the database connection
    public function getConnection() {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

}
