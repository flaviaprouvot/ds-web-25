<?php
require './mvc_php/models/database.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $db = new Database();
    $stmt = $db->executeQuery("DELETE FROM produtos WHERE idProduto = :id", [':id' => $id]);

    header("Location: /mvc_php/produto");
    exit;
} else {
    echo "ID inválido";
}