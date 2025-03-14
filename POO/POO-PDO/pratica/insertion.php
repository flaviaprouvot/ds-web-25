
<?php
include 'index.php';

$nome= $_POST['nome'];
$email= $_POST['email'];

$statement = $db->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
$nome = 'nome';
$email = 'email';
$statement->execute(array($nome, $email));
?>