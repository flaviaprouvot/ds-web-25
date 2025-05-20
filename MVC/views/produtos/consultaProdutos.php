<h1>Produtos cadastrados</h1>

<style>
h1{
    font-family: Arial, sans-serif;
}

table.produtos {
    width: 100%;
    border-collapse: collapse;
    background-color: #e6f2ff;  
    font-family: Arial, sans-serif;
    
}

table.produtos th, table.produtos td {
    border: 1px solid #b3d1ff;
    padding: 10px;
    text-align: center;
}

table.produtos th {
    background-color: #cce6ff;
    color: #003366;
}

table.produtos tr:nth-child(even) {
    background-color: #f2f9ff;
}

table.produtos tr:hover {
    background-color: #d9ecff;
}

button {
    background-color: #3399ff;
    border: none;
    color: white;
    padding: 6px 12px;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: #267acc;
}

.botao{
    background-color: #3399ff;
    border: none;
    color: white;
    padding: 6px 12px;
    cursor: pointer;
    border-radius: 4px;
    
}
</style>

<table class="produtos">

    <tr>
        <th>Nome:</th>
        <th>Preço:</th>
        <th>Estoque:</th>
        <th>Cadastrar</th>
        <th>Deletar</th>
    </tr>
    <?php
        foreach($dados as $dado){
            extract($dado);
            echo "<tr>";
                echo "<td>$nomeProduto</td>";
                echo "<td>$precoProduto</td>";
                echo "<td>$estoqueProduto</td>";
                echo "<td><a href='produto/$idProduto'><button>Acessar Produto</button></a></td>";
                echo "<td><a href='/mvc_php/produto/excluir/$idProduto'><button class='botao'>Deletar Produto</button></a></td>";


            echo "</tr>";
        }
    ?>
</table>
<br>

<a href="produto/cadastro"><button>Cadastrar produto</button></a>