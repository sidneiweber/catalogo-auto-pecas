<?php

/*
 * Classe para operações CRUD na tabela Cliente
 */

class Cliente {

    // Conexão e declaração de atributos
    private $conn;
    public $idCliente;
    public $nome;
    public $endereco;
    public $bairro;
    public $cidade;
    public $uf;
    public $cpf_cnpj;
    public $telefone;
    public $fax;

    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Metodos geters e setters
    function getIdCliente() {
        return $this->idCliente;
    }

    function getNome() {
        return $this->nome;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getUf() {
        return $this->uf;
    }

    function getCpf_cnpj() {
        return $this->cpf_cnpj;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getFax() {
        return $this->fax;
    }

    function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function setCpf_cnpj($cpf_cnpj) {
        $this->cpf_cnpj = $cpf_cnpj;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setFax($fax) {
        $this->fax = $fax;
    }
    
    // Metodo atualizar cliente
    public function update() {
        try {
            $sql = "UPDATE clientes SET nome=:nome, endereco=:endereco, bairro=:bairro, cidade=:cidade, uf=:uf, cpf_cnpj=:cpf_cnpj, telefone=:telefone, fax=:fax WHERE idCliente=:idCliente";
            $stm = $this->conn->prepare($sql);
            // Valores passados _POST
            $this->nome = htmlspecialchars(strip_tags($this->nome));
            $this->endereco = htmlspecialchars(strip_tags($this->endereco));
            $this->bairro = htmlspecialchars(strip_tags($this->bairro));
            $this->cidade = htmlspecialchars(strip_tags($this->cidade));
            $this->uf = htmlspecialchars(strip_tags($this->uf));
            $this->cpf_cnpj = htmlspecialchars(strip_tags($this->cpf_cnpj));
            $this->telefone = htmlspecialchars(strip_tags($this->telefone));
            $this->fax = htmlspecialchars(strip_tags($this->fax));
            $this->idCliente = htmlspecialchars(strip_tags($this->idCliente));
            // bind values
            $stm->bindParam(':nome', $this->nome);
            $stm->bindParam(':endereco', $this->endereco);
            $stm->bindParam(':bairro', $this->bairro);
            $stm->bindParam(':cidade', $this->cidade);
            $stm->bindParam(':uf', $this->uf);
            $stm->bindParam(':cpf_cnpj', $this->cpf_cnpj);
            $stm->bindParam(':telefone', $this->telefone);
            $stm->bindParam(':fax', $this->fax);
            $stm->bindParam(':idCliente', $this->idCliente);
            $stm->execute();
            echo "<script>alert('Registro atualizado com sucesso')</script>";
            echo '<meta http-equiv="refresh" content="0">';
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }
    
    // Metodo inserir cliente
    public function insert() {
        try {
            $sql = "INSERT INTO clientes (nome, endereco, bairro, cidade, uf, cpf_cnpj, telefone, fax) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->conn->prepare($sql);
            // posted values
            $this->nome = htmlspecialchars(strip_tags($this->nome));
            $this->endereco = htmlspecialchars(strip_tags($this->endereco));
            $this->bairro = htmlspecialchars(strip_tags($this->bairro));
            $this->cidade = htmlspecialchars(strip_tags($this->cidade));
            $this->uf = htmlspecialchars(strip_tags($this->uf));
            $this->cpf_cnpj = htmlspecialchars(strip_tags($this->cpf_cnpj));
            $this->telefone = htmlspecialchars(strip_tags($this->telefone));
            $this->fax = htmlspecialchars(strip_tags($this->fax));
            // bind values
            $stm->bindParam(1, $this->nome);
            $stm->bindParam(2, $this->endereco);
            $stm->bindParam(3, $this->bairro);
            $stm->bindParam(4, $this->cidade);
            $stm->bindParam(5, $this->uf);
            $stm->bindParam(6, $this->cpf_cnpj);
            $stm->bindParam(7, $this->telefone);
            $stm->bindParam(8, $this->fax);
            $stm->execute();
            echo "<script>alert('Registro inserido com sucesso')</script>";
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    // delete the product
    public function delete() {
        try {
            $query = "DELETE FROM clientes WHERE idCliente=:idCliente";
            // Prepare
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':idCliente', $this->idCliente);

            $stmt->execute();
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    public function getAllclientes() {
        try {
            $sql = "SELECT * FROM clientes ORDER by nome";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    public function getCliente($idCliente) {
        try {
            $sql = "SELECT * FROM clientes WHERE idCliente=?";
            $stm = $this->conn->prepare($sql);
            $stm->bindValue(1, $idCliente);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

}
