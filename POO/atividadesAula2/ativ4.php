<?php
//Crie um sistema de produtos para uma loja virtual.

abstract class Produto {
    private $nome;
    private $preco;
    private $estoque;
    private $tipo;

    public function setDados($nome, $preco, $estoque, $tipo) 
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
        $this->tipo = $tipo;
    }

    public function getNome() 
    {
        return $this->nome;
    }

    public function getPreco() 
    {
        return $this->preco;
    }

    public function getEstoque() 
    {
        return $this->estoque;
    }

    abstract public function calcularDesconto();
}

class Eletronico extends Produto {
    public function calcularDesconto() {
        $desconto = ($this->getPreco() / 100) * 10;
        if ($this->getEstoque() < 5) {
            $descontoExtra = ($this->getPreco() / 100) * 10;
            return $this->getPreco() - $desconto - $descontoExtra;
        } else {
            return $this->getPreco() - $desconto;
        }
    }
}

class Roupa extends Produto {
    public function calcularDesconto() {
        $desconto = ($this->getPreco() / 100) * 20;
        if ($this->getEstoque() < 5) {
            $descontoExtra = ($this->getPreco() / 100) * 10;
            return $this->getPreco() - $desconto - $descontoExtra;
        } else {
            return $this->getPreco() - $desconto;
        }
    }
}

    $eletronico = new Eletronico();
    $eletronico->setDados(nome: "Computador", preco: 3500, estoque: 7, tipo: "Eletronico");

    $roupa = new Roupa();
    $roupa->setDados(nome: "Vestido", preco: 85, estoque: 20, tipo: "Roupa");

    echo "Preço final do " . $eletronico->getNome() . ": R$" . $eletronico->calcularDesconto();
    echo "<br>";
    echo "Preço final da " . $roupa->getNome() . ": R$" . $roupa->calcularDesconto();
?>