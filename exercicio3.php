<?php

require_once 'ProdutoUtil.php';

try {
    echo "<h3>Exercício 3 — Método utilitário estático</h3>";

    $precoOriginal = 4500.00;
    $percentual = 10.0; // 10% de desconto

    $precoFormatado = ProdutoUtil::formatarMoeda($precoOriginal);
    $precoComDesconto = ProdutoUtil::calcularDesconto($precoOriginal, $percentual);
    $precoDescontoFormatado = ProdutoUtil::formatarMoeda($precoComDesconto);

    echo "Preço original: {$precoFormatado}<br>";
    echo "Desconto aplicado: {$percentual}%<br>";
    echo "Preço com desconto: {$precoDescontoFormatado}<br>";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}