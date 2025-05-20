<?php

require './models/database.php';

class Produto{
    private $conexao;

    public function __construct(){
        $this->conexao = new Database;
    }

    public function queryOne($parameters){
        $resultado = $this->conexao->executeQuery("SELECT * FROM produtos WHERE idProduto = :idProduto", $parameters);
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }

    public function queryAll(){
        $resultado = $this->conexao->executeQuery("SELECT * FROM produtos");
        $dados = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    public function Cadastro() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }

    // Obtém os dados do formulário
    $nomeProduto = $_POST["nomeProduto"] ?? '';
    $precoProduto = $_POST["precoProduto"] ?? 0;
    $estoqueProduto = $_POST["estoqueProduto"] ?? 0;

    $sql = "INSERT INTO produtos (nomeProduto, precoProduto, estoqueProduto) 
            VALUES (:nomeProduto, :precoProduto, :estoqueProduto)";
    
    $parameters = [
        ':nomeProduto' => $nomeProduto,
        ':precoProduto' => $precoProduto,
        ':estoqueProduto' => $estoqueProduto
    ];

    try {
        $this->conexao->executeQuery($sql, $parameters);
        echo "<script>alert('Produto cadastrado com sucesso!'); window.location.href = '/mvc_php/produto';</script>";
        exit;
    } catch (PDOException $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}

public function excluirProduto($id) {
    $db = new Database();
    $query = "DELETE FROM produtos WHERE idProduto = :id";
    $params = [':id' => $id];
    $db->executeQuery($query, $params);
}

    

}