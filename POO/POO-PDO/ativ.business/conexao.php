<?php
$host = 'localhost'; 
$usuario = 'root'; 
$senha = '';       
$banco = 'pdo'; 

try {
    // Criando a conexão com PDO
    $conexao = new PDO("mysql:host=$host;dbname=$pdo", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
