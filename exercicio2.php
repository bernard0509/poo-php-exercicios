<?php

require_once 'Produto.php';

try {
    
    $p1 = new Produto("Notebook", 4500.00, 10);
    $p2 = new Produto("Mouse Gamer", 150.00, 25);
    $p3 = new Produto("Teclado Mecânico", 350.00, 15);

    echo $p1->exibirDetalhes() . "<br>";
    echo $p2->exibirDetalhes() . "<br>";
    echo $p3->exibirDetalhes() . "<br><br>";

    
    echo "Total de produtos cadastrados (Contador): " . Produto::$totalProdutos . "<br>";
    echo "Estoque total acumulado: " . Produto::$estoqueTotal . " unidades<br>";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}