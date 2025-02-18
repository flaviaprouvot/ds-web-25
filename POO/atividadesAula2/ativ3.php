<?php
//Crie um sistema para gerenciar veículos com diferentes comportamentos.

class Veiculo {
    protected $marca;
    protected $modelo;
    private $velocidade; 

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidade = 0; 
    }

    public function setVelocidade($velocidade) {
        if ($velocidade >= 0) {
            $this->velocidade = $velocidade;
        } else {
            echo "A velocidade não pode ser negativa.<br>";
        }
    }

    public function getVelocidade() {
        return $this->velocidade;
    }

    public function exibir() {
        echo "Marca: {$this->marca}, Modelo: {$this->modelo}, Velocidade: {$this->getVelocidade()} km/h<br>";
    }
}

class Carro extends Veiculo {
    public function __construct($marca, $modelo) {
        parent::__construct($marca, $modelo);
    }

    public function acelerar() {
        $novaVelocidade = $this->getVelocidade() + 10; 
        $this->setVelocidade($novaVelocidade);
        echo "O carro {$this->marca} {$this->modelo} acelerou para {$this->getVelocidade()} km/h.<br>";
    }
}

class Moto extends Veiculo {
    public function __construct($marca, $modelo) {
        parent::__construct($marca, $modelo);
    }

    public function acelerar() {
        $novaVelocidade = $this->getVelocidade() + 15; 
        $this->setVelocidade($novaVelocidade);
        echo "A moto {$this->marca} {$this->modelo} acelerou para {$this->getVelocidade()} km/h.<br>";
    }
}

$carro = new Carro("Wolkswagen", "Polo");
$moto = new Moto("BMW", "x360");

$carro->exibir();
$moto->exibir();
echo "<br>";

$carro->acelerar();
$moto->acelerar();
echo "<br>";


$carro->exibir();
$moto->exibir();

?>