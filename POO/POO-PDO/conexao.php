<?php

//MySQL
$db = new PDO("mysql:host=localhost;dbname=pdo", "root", "");

//var_dump($db);
//echo "<br><br>";
//print_r($db);

/*
echo "<h2>Exemplo de consulta com poucas linhas:</h2>";
$dados = $db->query("SELECT * FROM clientes");
$todos = $dados->fetch(PDO::FETCH_ASSOC); //registros retornados
print_r($todos);
echo "<br>";
echo $todos ['email'];
*/

?>