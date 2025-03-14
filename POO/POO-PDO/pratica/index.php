<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
}

form {
    background-color: #fff;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 8px;
   
}

label {
    font-size: 16px;
    color: #333;
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

</style>

</head>
<body>

    <?php
        include 'conexao.php';
    ?>

<form action='conexao.php' method="POST">
        <label>Nome:</label>
        <input type="text" name="nome">
        <br><br>
        <label>Email:</label>
        <input type="text" name="email">
        <br><br>
        <input type="submit">
    </form>

    <?php
        $dados = $db->query("SELECT * FROM clientes");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC);

        foreach($todos as $linha)
        {
            echo "Nome: " .$linha['nome'];
            echo "<br>";
            echo "E-mail: " .$linha['email'];
            echo "<br><br>";
        }
    ?>

</body>
</html>