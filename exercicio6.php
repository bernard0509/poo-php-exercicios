<?php

class Produto {
    public const CATEGORIA_PADRAO = "Geral";
    public const DESCONTO_MAXIMO_PERMITIDO = 50.0;

    public static int $totalProdutos = 0;

    private string $nome;
    private float $preco;
    private int $quantidadeEstoque;
    private string $categoria;

    public function __construct(string $nome, float $preco, int $quantidadeEstoque, string $categoria = self::CATEGORIA_PADRAO) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidadeEstoque = $quantidadeEstoque;
        $this->categoria = $categoria;
        self::$totalProdutos++;
    }

    public function aplicarDescontoEspecial(float $percentual): float {
        if ($percentual > self::DESCONTO_MAXIMO_PERMITIDO) {
            throw new InvalidArgumentException("O desconto não pode ser superior ao limite de " . self::DESCONTO_MAXIMO_PERMITIDO . "%");
        }
        $valorDesconto = $this->preco * ($percentual / 100);
        return $this->preco - $valorDesconto;
    }

    public function exibirDetalhes(): string {
        return "Produto: {$this->nome} | Categoria: {$this->categoria} | Preço: R$ " . number_format($this->preco, 2, ',', '.') . " | Estoque: {$this->quantidadeEstoque} un.";
    }
}

try {
    echo "<h3>Exercício 6 — Constante de classe</h3>";

    $p1 = new Produto("Smartphone", 2500.00, 5);
    
    echo $p1->exibirDetalhes() . "<br><br>";

    echo "Categoria Padrão da Loja (Constante): " . Produto::CATEGORIA_PADRAO . "<br>";
    echo "Desconto Máximo Permitido (Constante): " . Produto::DESCONTO_MAXIMO_PERMITIDO . "%<br><br>";


    $precoComDesconto = $p1->aplicarDescontoEspecial(20.0);
    echo "Preço após aplicar 20% de desconto: R$ " . number_format($precoComDesconto, 2, ',', '.') . "<br>";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}