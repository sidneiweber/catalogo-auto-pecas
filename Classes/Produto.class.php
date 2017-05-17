<?php

/*
 * Classe para operações CRUD na tabela Produto
 */

Class Produto {

    private $conn;
    public $id;
    public $codigo;
    public $produto;
    public $descricao;
    public $estoque;
    public $codigo_original;
    public $codigo_paralelo;
    public $ncm;
    public $preco;
    public $promocao;
    public $foto;
    public $pasta;
    public $custo;
    public $ultimo_fornecedor;
    public $nomeProduto;

    public function __construct($db) {
        $this->conn = $db;
    }

    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getProduto() {
        return $this->produto;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getEstoque() {
        return $this->estoque;
    }

    function getCodigo_original() {
        return $this->codigo_original;
    }

    function getCodigo_paralelo() {
        return $this->codigo_paralelo;
    }

    function getNcm() {
        return $this->ncm;
    }

    function getPreco() {
        return $this->preco;
    }

    function getPromocao() {
        return $this->promocao;
    }

    function getFoto() {
        return $this->foto;
    }

    function getPasta() {
        return $this->pasta;
    }

    function getCusto() {
        return $this->custo;
    }

    function getUltimo_fornecedor() {
        return $this->ultimo_fornecedor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setProduto($produto) {
        $this->produto = $produto;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    function setCodigo_original($codigo_original) {
        $this->codigo_original = $codigo_original;
    }

    function setCodigo_paralelo($codigo_paralelo) {
        $this->codigo_paralelo = $codigo_paralelo;
    }

    function setNcm($ncm) {
        $this->ncm = $ncm;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setPromocao($promocao) {
        $this->promocao = $promocao;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setPasta($pasta) {
        $this->pasta = $pasta;
    }

    function setCusto($custo) {
        $this->custo = $custo;
    }

    function setUltimo_fornecedor($ultimo_fornecedor) {
        $this->ultimo_fornecedor = $ultimo_fornecedor;
    }

//METODO INSERIR PRODUTO
    public function insert() {
        try {
            $sql = "INSERT INTO produtos (codigo, produto, descricao, estoque, codigo_original, codigo_paralelo, ncm, preco, promocao, foto, custo, ultimo_fornecedor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->conn->prepare($sql);
            // posted values
            $this->codigo = htmlspecialchars(strip_tags($this->codigo));
            $this->produto = htmlspecialchars(strip_tags($this->produto));
            $this->descricao = htmlspecialchars(strip_tags($this->descricao));
            $this->estoque = htmlspecialchars(strip_tags($this->estoque));
            $this->codigo_original = htmlspecialchars(strip_tags($this->codigo_original));
            $this->codigo_paralelo = htmlspecialchars(strip_tags($this->codigo_paralelo));
            $this->ncm = htmlspecialchars(strip_tags($this->ncm));
            $this->preco = htmlspecialchars(strip_tags($this->preco));
            $this->promocao = htmlspecialchars(strip_tags($this->promocao));
            $this->foto = htmlspecialchars(strip_tags($this->foto));
            $this->custo = htmlspecialchars(strip_tags($this->custo));
            $this->ultimo_fornecedor = htmlspecialchars(strip_tags($this->ultimo_fornecedor));
            // bind values
            $stm->bindParam(1, $this->codigo);
            $stm->bindParam(2, $this->produto);
            $stm->bindParam(3, $this->descricao);
            $stm->bindParam(4, $this->estoque);
            $stm->bindParam(5, $this->codigo_original);
            $stm->bindParam(6, $this->codigo_paralelo);
            $stm->bindParam(7, $this->ncm);
            $stm->bindParam(8, $this->preco);
            $stm->bindParam(9, $this->promocao);
            $stm->bindParam(10, $this->foto);
            $stm->bindParam(11, $this->custo);
            $stm->bindParam(12, $this->ultimo_fornecedor);
            $stm->execute();
            echo "<script>alert('Produto inserido com sucesso')</script>";
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    // Metodo atualizar produto
    public function update() {
        try {
            $sql = "UPDATE produtos SET codigo=:codigo, produto=:produto, descricao=:descricao, estoque=:estoque, codigo_original=:codigo_original, codigo_paralelo=:codigo_paralelo, ncm=:ncm, preco=:preco, promocao=:promocao, custo=:custo, ultimo_fornecedor=:ultimo_fornecedor WHERE id=:id";
            $stm = $this->conn->prepare($sql);
            // Valores passados _POST
            $this->codigo = htmlspecialchars(strip_tags($this->codigo));
            $this->produto = htmlspecialchars(strip_tags($this->produto));
            $this->descricao = htmlspecialchars(strip_tags($this->descricao));
            $this->estoque = htmlspecialchars(strip_tags($this->estoque));
            $this->codigo_original = htmlspecialchars(strip_tags($this->codigo_original));
            $this->codigo_paralelo = htmlspecialchars(strip_tags($this->codigo_paralelo));
            $this->ncm = htmlspecialchars(strip_tags($this->ncm));
            $this->preco = htmlspecialchars(strip_tags($this->preco));
            $this->promocao = htmlspecialchars(strip_tags($this->promocao));
            $this->custo = htmlspecialchars(strip_tags($this->custo));
            $this->ultimo_fornecedor = htmlspecialchars(strip_tags($this->ultimo_fornecedor));
            $this->id = htmlspecialchars(strip_tags($this->id));
            // bind values
            $stm->bindParam(':codigo', $this->codigo);
            $stm->bindParam(':produto', $this->produto);
            $stm->bindParam(':descricao', $this->descricao);
            $stm->bindParam(':estoque', $this->estoque);
            $stm->bindParam(':codigo_original', $this->codigo_original);
            $stm->bindParam(':codigo_paralelo', $this->codigo_paralelo);
            $stm->bindParam(':ncm', $this->ncm);
            $stm->bindParam(':preco', $this->preco);
            $stm->bindParam(':promocao', $this->promocao);
            $stm->bindParam(':custo', $this->custo);
            $stm->bindParam(':ultimo_fornecedor', $this->ultimo_fornecedor);
            $stm->bindParam(':id', $this->id);
            $stm->execute();
            echo "<script>alert('Registro atualizado com sucesso')</script>";
            echo '<meta http-equiv="refresh" content="0">';
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    // delete the product
    public function delete() {
        try {
            $query = "DELETE FROM produtos WHERE id=:id";
            // Prepare
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);

            $stmt->execute();
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    public function getOneProduto($id) {
        try {
            $sql = "SELECT * FROM produtos WHERE id=?";
            $stm = $this->conn->prepare($sql);
            $stm->bindValue(1, $id);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    public function getUltimosProdutos() {
        try {
            $sql = "SELECT * FROM produtos ORDER By id DESC LIMIT 10";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    public function getAllProdutos($inicio, $porpagina) {
        try {
            $this->inicio = $inicio;
            $this->porpagina = $porpagina;
            $sql = "SELECT * FROM produtos ORDER by produto,descricao DESC LIMIT $this->inicio,$this->porpagina";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            return $dados;
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

    public function getTotalProdutos() {
        try {
            $sql = "SELECT COUNT(*) AS total FROM produtos";
            $stm = $this->conn->prepare($sql);
            $stm->execute();
            $numeroResultados = $stm->fetchColumn();
            return $numeroResultados;
        } catch (PDOException $erro) {
            echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";
        }
    }

}
