<?php


class ProdutoTeste {
    public static int $totalProdutos = 0;
    
    private string $nome;
    private float $preco;
    private int $quantidadeEstoque;

    public function __construct(string $nome, float $preco, int $quantidadeEstoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidadeEstoque = $quantidadeEstoque;
        self::$totalProdutos++;
    }


    public static function criarProdutoPadrao(): self {
        return new self("Produto Genérico", 10.00, 1);
    }

    public function exibirDetalhes(): string {
        return "Produto: {$this->nome} | Preço: R$ " . number_format($this->preco, 2, ',', '.') . " | Estoque: {$this->quantidadeEstoque} un.";
    }
}

try {
    echo "<h3>Exercício 4 — Método fábrica estático</h3>";

    // Criando o objeto via método fábrica sem usar 'new' externamente
    $produtoPadrao = ProdutoTeste::criarProdutoPadrao();

    echo "Objeto criado com sucesso via método fábrica!<br><br>";
    echo $produtoPadrao->exibirDetalhes() . "<br><br>";
    echo "Total de produtos: " . ProdutoTeste::$totalProdutos;

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}