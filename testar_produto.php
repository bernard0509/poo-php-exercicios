<?php

require_once 'Produto.php';

// Criando 3 objetos da classe Produto
$p1 = new Produto("Notebook", 4500.00, 10);
$p2 = new Produto("Mouse Gamer", 150.00, 25);
$p3 = new Produto("Teclado Mecânico", 350.00, 15);

echo "Total de produtos instanciados: " . Produto::$totalProdutos . "\n";
