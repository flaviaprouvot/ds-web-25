<?php
$subRota = $caminho[1] ?? null;

switch($subRota){
    case '':
            require_once './models/usuario.php';
        
            if(count($_POST) > 0 && isset($_FILES['fotoUsuario'])){
                extract($_POST);
                $usuario = new Usuario();
                $usuario->atualizaCadastro(
                    [":nomeUsuario" => $nomeUsuario, ':emailUsuario' => $emailUsuario, ':senhaUsuario' => $senhaUsuario],
                    $_FILES
                );
            }
        
            $usuario = new Usuario();
            $dados = $usuario->queryOne([':idUsuario' => 1]);
            require './views/usuarios/usuario.php';
            break;

    default:
        echo "404 - Página não encontrada";
        break;
}