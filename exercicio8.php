<?php

require_once 'Produto.php';
require_once 'ProdutoUtil.php'; // Classe utilitária do Exercício 3

try {
    echo "<h3>Exercício 8 — Juntando tudo (Consolidação)</h3>";

    $p1 = new Produto("Cadeira Gamer", 1200.00, 8, Produto::CATEGORIA_PADRAO, Produto::STATUS_DISPONIVEL);
    $p2 = Produto::criarProdutoPadrao(); // Método fábrica (Exercício 4)

    echo $p1->exibirDetalhes() . "<br>";
    echo $p2->exibirDetalhes() . "<br><br>";

    $precoFormatado = ProdutoUtil::formatarMoeda($p1->getPreco());
    echo "Preço formatado via classe utilitária: {$precoFormatado}<br>";

    $precoComDesconto = $p1->aplicarDescontoEspecial(15.0);
    echo "Preço com 15% de desconto especial: R$ " . number_format($precoComDesconto, 2, ',', '.') . "<br><br>";


    echo "<strong>--- Dados Estatísticos da Classe ---</strong><br>";
    echo "Total de produtos instanciados: " . Produto::$totalProdutos . "<br>";
    echo "Estoque total acumulado: " . Produto::$estoqueTotal . " unidades<br>";
    echo "Categoria Padrão da Loja: " . Produto::CATEGORIA_PADRAO . "<br>";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}