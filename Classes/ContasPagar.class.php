<?php

/*
 * Classe para operacoes CRUD na tabela Contas Pagar   
 */

class ContasPagar {

    // Conexão e declaração de atributos
    private $conn;
    public $id;
    public $fornecedor;
    public $numero_documento;
    public $data;
    public $valor;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    function getId() {
        return $this->id;
    }

    function getFornecedor() {
        return $this->fornecedor;
    }

    function getNumero_documento() {
        return $this->numero_documento;
    }

    function getData() {
        return $this->data;
    }

    function getValor() {
        return $this->valor;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFornecedor($fornecedor) {
        $this->fornecedor = $fornecedor;
    }

    function setNumero_documento($numero_documento) {
        $this->numero_documento = $numero_documento;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getHoje() { 
        echo date('d/m/Y');
    }

    function getNomeMes($mes) {
        $this->getNomeMes = $mes;
        switch ($this->getNomeMes) {
            case 01: case 1: $this->getNomeMes = "Janeiro";
                break;
            case 02: case 2: $this->getNomeMes = "Fevereiro";
                break;
            case 03: case 3: $this->getNomeMes = "Mar&ccedil;o";
                break;
            case 04: case 4: $this->getNomeMes = "Abril";
                break;
            case 05: case 5: $this->getNomeMes = "Maio";
                break;
            case 06: case 6: $this->getNomeMes = "Junho";
                break;
            case 07: case 7: $this->getNomeMes = "Julho";
                break;
            case 08: case 8: $this->getNomeMes = "Agosto";
                break;
            case 09: case 9: $this->getNomeMes = "Setembro";
                break;
            case 10: $this->getNomeMes = "Outubro";
                break;
            case 11: $this->getNomeMes = "Novembro";
                break;
            case 12: $this->getNomeMes = "Dezembro";
                break;
        }
        return $this->getNomeMes;
    }
    
    function getMes() {
        echo date('m');
    }
    
    function getAno() {
        echo date('Y'); 
    }

    public function contasPagarHoje() {

        try {
            $sql = "SELECT * FROM contas_pagar WHERE data LIKE {$this->getHoje()} ORDER BY fornecedor ASC";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    function contasMes() {

        try {
            $sql = "SELECT SUM(valor) as total FROM `contas_pagar` WHERE data BETWEEN ('".date('Y')."-".date('m')."-01') AND ('".date('Y')."-".date('m')."-31')";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $count = $stm->fetchColumn();
            return $count;
            
            //setlocale(LC_MONETARY, 'pt_BR');
            //echo money_format('%i', $number) . "\n";
            
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }
    
    function contasProximoMes() {

        try {
            $sql = "SELECT SUM(valor) as total FROM `contas_pagar` WHERE data BETWEEN ('".date('Y')."-".date('m', strtotime('+1 months'))."-01') AND ('".date('Y')."-".date('m', strtotime('+1 months'))."-31')";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $count = $stm->fetchColumn();
            return $count;
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

}
