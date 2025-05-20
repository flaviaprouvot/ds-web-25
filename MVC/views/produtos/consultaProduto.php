<h1>Produto:</h1>
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
    text-align: left;
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
</style>


<table class="produtos">
    <tr>
        <th>Nome:</th>
        <th>Preço:</th>
        <th>Estoque:</th>
    </tr>
    <?php
        foreach($dados as $dado){
            extract($dado);
            echo "<tr>";
                echo "<td>$nomeProduto</td>";
                echo "<td>$precoProduto</td>";
                echo "<td>$estoqueProduto</td>";
            echo "</tr>";
        }
    ?>
</table>