<?php

class Conexao {

    private $host = "localhost";
    private $db_name = "catalogo";
    private $username = "root";
    private $password = getEncryptedPass(9ef20ec6832a9c4adfb35c2ae1d86f85);
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
