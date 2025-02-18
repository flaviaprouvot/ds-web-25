<?php
// Crie um sistema para gerenciar funcionários de uma empresa.

class Pessoa {
    // atributos
    public $nome;
    protected $idade;

    // métodos 
    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getIdade() {
        return $this->idade;
    }
}

class Funcionario extends Pessoa {
    // atributos
    protected $salario;

    // métodos
    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }

    // métodos
    public function calcularBonus() {
        return 0; 
    }
}

class Gerente extends Funcionario {
    // métodos
    public function calcularBonus() {
        return (($this->salario / 100) * 20);
    }
}

class Desenvolvedor extends Funcionario {
    // métodos
    public function calcularBonus() {
        return (($this->salario / 100) * 10);
    }
}

// instanciando objetos
$gerente = new Gerente();
$gerente->nome = "Bruno";
$gerente->setIdade(25);
$gerente->setSalario(5000);
$gerente->bonus = $gerente->calcularBonus();

echo "Nome: ".$gerente->nome; 
echo "<br>";
echo "Idade: ".$gerente->getIdade()." anos.";
echo "<br>";
echo "Salário: " .$gerente->getSalario()." reais.";
echo "<br>";
echo "Bônus: ".$gerente->bonus." reais.";
echo "<br>";
echo "<br>";

$dev = new Desenvolvedor(); 
$dev->nome = "Charles";
$dev->setIdade(20);
$dev->setSalario(3000);
$dev->bonus = $dev->calcularBonus();

echo "Nome: ".$dev->nome; 
echo "<br>";
echo "Idade: ".$dev->getIdade()." anos.";
echo "<br>";
echo "Salário: " .$dev->getSalario()." reais.";
echo "<br>";
echo "Bônus: ".$dev->bonus." reais.";
echo "<br>";
?>