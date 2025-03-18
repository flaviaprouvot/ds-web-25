
<?php
    session_start();

    //Verifica se veio do Formulário
    if(isset($_POST['nome'])){
        //Verifica se o login esta correto
        include_once('conexao.php');
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM administrador WHERE nome = '$nome' , cargo = '$cargo' , email = '$email' , senha = '$senha'";
        $resultado = mysqli_query($conexao, $sql);    
        // Verifica se há registros
        if (mysqli_num_rows($resultado) > 0) {
            //Converte em Array Associativo
            $linha = mysqli_fetch_assoc($resultado);
            //Grava os dados na sessão
            $_SESSION['login'] = $linha['login'];
            $_SESSION['cargo'] = $linha['Gerente'];
            $_SESSION['email'] = $linha['email'];
            $_SESSION['senha'] = $linha['senha'];
        }else{
            $_SESSION['erro'] = "Login ou senha invalida";
        }

    }

    if(isset($_SESSION['nome']) and isset($_SESSION['Gerente']) and isset($_SESSION['email']) and isset($_SESSION['senha'])){
        echo '<br>';
        echo $_SESSION['nome'];
        echo '<br>';
        echo $_SESSION['Gerente'];
        echo '<br>';
        echo $_SESSION['email'];
        echo '<br>';
        echo $_SESSION['senha'];
        echo '<br><br>';

        echo '<a href="logout.php"><button>Logout</button></a>';
    }else{
        header('Location: index.php');
    }


    

?>