<?php
//Atividade 1

class Veiculo{

    //atributos
    public $marca;
    protected $seguro;
    private $renavam;

    //método
    public function ligar(){
        return "Carro ligado.";
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
        return "TV ligada";
    }
    public function desligar(){
        return "TV desligada";
    }
    public function conectar(){
        return "TV conectada";
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
    public function exibirOpcoes(){
        return "Exibir opções de massagem.";
    }
    public function emitirAviso(){
        return "Bateria fraca.";
    }
    public function reclinar(){
        return "Deseja inclinar a cadeira?";
    }

}

//// 

class Geladeira{

    //atributos
    public $quantPortas;
    public $capacidade;
    public $marca;
    public $temperatura;
    public $modelo;

    //métodos
    public function emitirAviso(){
        return "Geladeira cheia!";
    }
    public function consultarCapacidade(){
        return $capacidade;
    }
    public function exibirTemperatura(){
        return $temperatura;
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
        return "Conexão efetuada!";
    }
    public function aletarBateria(){
        return "Bateria baixa!";
    }
    public function conectarBt(){
        return "Conexão estabelecida!";
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
    public function consultarPreco(){
        return $preco;
    }
    public function exibirCor(){
        return $cor;
    }
    public function exibirTamanho(){
        return $tamanho;
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
    public function exibirSaldo(){
        return $saldo;
    }
    public function exibirTitular(){
        return $nomeTitular;
    }
    public function exibirNumeroConta(){
        return $numeroConta;
    }
}

    //objetos
    $contaCarol = new contaBancaria(); //inicio objeto
    $contaCarol->numeroConta = "477.940.078-36"; // valores
    $contaCarol->nomeTitular = "Caroline Souza"; 
    $contaCarol->saldo = "R$1.700,00";

    $contaBabi = new contaBancaria(); //inicio objeto
    $contaBabi->numeroConta = "463.625.488-09"; // valores
    $contaBabi->nomeTitular = "Bárbara Savassa"; 
    $contaBabi->saldo = "R$2,50";

    $contaRafa = new contaBancaria(); //inicio objeto
    $contaRafa->numeroConta = "413.076.548-51"; // valores
    $contaRafa->nomeTitular = "Rafaela Lage"; 
    $contaRafa->saldo = "R$145,00";

?>