<?php
$subRota = $caminho[1] ?? null;

switch($subRota){
    case '':
        require './models/produto.php';
        $produto = new Produto;
        $dados = $produto->queryAll();
        require './views/produtos/consultaProdutos.php';
        break;

    case 'cadastro':
        require './models/produto.php';
        $produto = new Produto;


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produto->Cadastro();
        }

        require './views/produtos/cadastroProduto.php';
        break;


        break;
        
        case 'excluir':
            require './models/produto.php';
            $produto = new Produto();
        

            $rotaRestante = $caminho[2] ?? '';
        

            if (preg_match('/^([0-9]+)$/', $rotaRestante, $matches)) {
                $id =$matches[1];
                $produto->excluirProduto($id);
        
                header("Location: /mvc_php/produto");
                exit;
            } else {
                echo "ID inválido para exclusão.";
            }
            break;
        
    default:
        if(preg_match('/^produto\/([0-9]+)$/', $url, $matches)) {
            $id = $matches[1];

            require './models/produto.php';
            $produto = new Produto;
            $dados = $produto->queryOne([":idProduto" => $id]);
            require './views/produtos/consultaProduto.php';
        }
        break;
}
