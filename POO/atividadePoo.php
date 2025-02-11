<?php
//Atividade 1

class Veiculo{

    //atributos
    public $marca;
    protected $seguro;
    private $renavam;

    //método
    public function ligar(){

    }
}

//instanciando objetos
    $polo = new Veiculo();
    $polo->marca = "Wolkswagem";
    $polo->renavam = "123123123123";


//Atividades
class TV{

    //atributos
    public $voltagem;
    public $capacidade;
    public $compatibilidade;
    public $ano;
    public $marca;

    //métodos
    public function ligar(){

    }
    public function desligar(){

    }
    public function conectar(){

    }
}

///

class Poltrona{

    //atributos
    public $modelo;
    public $reclinagem;
    public $material;
    public $cor;
    public $fabrica;

    //métodos
    public function massagear(){

    }
    public function emitirAviso(){

    }
    public function reclinar(){
    }

}

//// 

class Geladeira{

    //atributos
    public $quantPortas;
    public $tamanho;
    public $marca;
    public $cor;
    public $modelo;

    //métodos
    public function refrigerar(){

    }
    public function listarProdutos(){

    }
    public function regularTemperatura(){
        
    }
}

///

class Mouse{

    //atributos
    public $modelo;
    public $preco;
    public $marca;
    public $cor;
    public $fio;

    //métodos
    public function conectarFio(){
        
    }
    public function aletarBateria(){

    }
    public function conectarBt(){
    }

}

///

class Lousa{

    //atributos
    public $modelo;
    public $preco;
    public $marca;
    public $cor;
    public $tamanho;

    //métodos
    public function conectarInternet(){

    }
    public function touch(){

    }
    public function exibirVideos(){
        
    }
}

///

//Atividade 2

class contaBancaria{

    //atributos
    public $numeroConta;
    public $nomeTitular;
    public $saldo;

    //métodos
    public function exigirDigital(){

    }
    public function emitirAvisos(){

    }
    public function monitorarMovimentacoes(){

    }
}
$contaCarol = new contaBancaria(); //inicio objeto
$contaCarol->numeroConta = "477.940.078-36"; // valores
$contaCarol->nomeTitular = "Caroline Souza"; 
$contaCarol->saldo = "R$1.700,00";

$contaBabi = new contaBancaria(); //inicio objeto
$contaBabi->numeroConta = "463.625.488-09"; // valores
$contaBabi->nomeTitular = "Bárbara Savassa"; 
$contaBabi->saldo = "R$2,50"

$contaRafa = new contaBancaria(); //inicio objeto
$contaRafa->numeroConta = "413.076.548-51"; // valores
$contaRafa->nomeTitular = "Rafaela Lage"; 
$contaRafa->saldo = "R$145,00"

?>