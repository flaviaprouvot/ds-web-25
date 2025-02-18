<?php
//Atividade 1

class Veiculo{

    //atributos
    public $marca;
    public $seguro;
    public $renavam;

    //metodo
    public function ligar(){
        return "Carro ligado.";
    }
}

//instanciando objetos
    $polo = new Veiculo();
    $polo->marca = " Carro Wolkswagem";
    $polo->renavam = "123123123123";
    echo $polo->renavam; 
    echo "<br>";
    echo $polo->marca;
    echo "<br>";
    echo "<br>";


//Atividades
class TV{

    //atributos
    public $voltagem;
    public $capacidade;
    public $compatibilidade;
    public $ano;
    public $marca;

    //metodos
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

    //instanciando objetos
    $sansung = new TV();
    $sansung->marca = "TV sansung";
    $sansung->ano= "2019";
    echo $sansung->marca; 
    echo "<br>";
    echo $sansung->ano;
    echo "<br>";
    echo "<br>";

///

class Poltrona{

    //atributos
    public $modelo;
    public $reclinagem;
    public $material;
    public $cor;
    public $fabrica;

    //metodos
    public function exibirOpcoes(){
        return "Exibir opcoes de massagem.";
    }
    public function emitirAviso(){
        return "Bateria fraca.";
    }
    public function reclinar(){
        return "Deseja inclinar a cadeira?";
    }

}

    //instanciando objetos
    $sofa = new Poltrona();
    $sofa->modelo = " Poltrona Reclinavel";
    $sofa->cor = "Azul";
    echo $sofa->modelo; 
    echo "<br>";
    echo $sofa->cor;
    echo "<br>";
    echo "<br>";

//// 

class Geladeira{

    //atributos
    public $quantPortas;
    public $capacidade;
    public $marca;
    public $temperatura;
    public $modelo;

    //metodos
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

    $geladeira = new Geladeira();
    $geladeira->modelo = "Geladeira Frostfree";
    $geladeira->quantPortas = "10 portas";
    echo $geladeira->modelo; 
    echo "<br>";
    echo $geladeira->quantPortas;
    echo "<br>";
    echo "<br>";

///

class Mouse{

    //atributos
    public $modelo;
    public $preco;
    public $marca;
    public $cor;
    public $fio;

    //metodos
    public function conectarFio(){
        return "Conexao efetuada!";
    }
    public function aletarBateria(){
        return "Bateria baixa!";
    }
    public function conectarBt(){
        return "Conexao estabelecida!";
    }

}

    $mouse = new Mouse();
    $mouse->modelo = "Mouse sem fio";
    $mouse->cor = "Branco";
    echo $mouse->modelo; 
    echo "<br>";
    echo $mouse->cor;
    echo "<br>";
    echo "<br>";

///

class Lousa{

    //atributos
    public $modelo;
    public $preco;
    public $marca;
    public $cor;
    public $tamanho;

    //metodos
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

    $lousa = new Lousa();
    $lousa->modelo = "Lousa digital";
    $lousa->cor = "Verde";
    echo $lousa->modelo; 
    echo "<br>";
    echo $lousa->cor;
    echo "<br>";
    echo "<br>";
///

//Atividade 2

class contaBancaria{

    //atributos
    public $numeroConta;
    public $nomeTitular;
    public $saldo;

    //metodos
    public function exibirSaldo(){
        return "O saldo e R$" .$this->saldo.",00";
    }
    public function depositar($deposito){
        $this->saldo-= $deposito;
        return "Esse e o novo saldo: R$" .$this->saldo.",00";
    }
    public function sacar($saque){
        $this->saldo-= $saque;
        return "Esse e o novo saldo: R$" .$this->saldo.",00";
    }
}

    //objetos
    $contaCarol = new contaBancaria(); //inicio objeto
    $contaCarol->numeroConta = "477.940.078-36"; // valores
    $contaCarol->nomeTitular = "Caroline Souza"; 
    $contaCarol->saldo = "1.700";
    echo "<br>";
    echo "<br>";

        echo "Titular da conta:" .$contaCarol->nomeTitular; 
        echo "<br>";
        echo $contaCarol->exibirSaldo();
        echo "<br>";
        echo $contaCarol->sacar(20);
    
    $contaBabi = new contaBancaria(); //inicio objeto
    $contaBabi->numeroConta = "463.625.488-09"; // valores
    $contaBabi->nomeTitular = "Barbara Savassa"; 
    $contaBabi->saldo = "2";
    echo "<br>";
    echo "<br>";

        echo $contaBabi->numeroConta; 
        echo "<br>";
        echo $contaBabi->nomeTitular;
        echo "<br>";
        echo $contaBabi->saldo;

    $contaRafa = new contaBancaria(); //inicio objeto
    $contaRafa->numeroConta = "413.076.548-51"; // valores
    $contaRafa->nomeTitular = "Rafaela Lage"; 
    $contaRafa->saldo = "145";
    echo "<br>";
    echo "<br>";

        echo $contaRafa->numeroConta; 
        echo "<br>";
        echo $contaRafa->nomeTitular;
        echo "<br>";
        echo $contaRafa->saldo;

?>