<?php

require_once 'Produto.php';

try {
    echo "<h3>Exercício 9 — Registro e listagem automática de objetos (Desafio)</h3>";

    new Produto("Monitor Ultrawide", 1800.00, 7);
    new Produto("Mousepad Grande", 60.00, 30);
    Produto::criarProdutoPadrao(); 

    echo "<strong>Lista de todos os produtos cadastrados via Produto::listarTodos():</strong><br><br>";

    Produto::listarTodos();

    echo "<br>Total geral registrado no contador: " . Produto::$totalProdutos;

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}