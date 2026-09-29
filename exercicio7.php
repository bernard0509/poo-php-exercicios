<?php

class Produto {
    public const CATEGORIA_PADRAO = "Geral";
    public const DESCONTO_MAXIMO_PERMITIDO = 50.0;

    // 3 constantes relacionadas para o Status (Exercício 7)
    public const STATUS_DISPONIVEL = "Disponível";
    public const STATUS_ESGOTADO = "Esgotado";
    public const STATUS_EM_BREVE = "Em Breve";

    public static int $totalProdutos = 0;

    private string $nome;
    private float $preco;
    private int $quantidadeEstoque;
    private string $categoria;
    private string $status;

    public function __construct(string $nome, float $preco, int $quantidadeEstoque, string $categoria = self::CATEGORIA_PADRAO, string $status = self::STATUS_DISPONIVEL) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidadeEstoque = $quantidadeEstoque;
        $this->categoria = $categoria;
        $this->setStatus($status);
        self::$totalProdutos++;
    }

    public function setStatus(string $status): void {
        $statusValidos = [self::STATUS_DISPONIVEL, self::STATUS_ESGOTADO, self::STATUS_EM_BREVE];
        if (!in_array($status, $statusValidos)) {
            throw new InvalidArgumentException("Status inválido informado.");
        }
        $this->status = $status;
    }

    public function setQuantidadeEstoque(int $quantidadeEstoque): void {
        if ($quantidadeEstoque < 0) {
            throw new InvalidArgumentException("A quantidade não pode ser negativa.");
        }
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function exibirDetalhes(): string {
        return "Produto: {$this->nome} | Categoria: {$this->categoria} | Status: {$this->status} | Preço: R$ " . number_format($this->preco, 2, ',', '.') . " | Estoque: {$this->quantidadeEstoque} un.";
    }
}

try {
    echo "<h3>Exercício 7 — Múltiplas constantes relacionadas (Status)</h3>";

   
    $p1 = new Produto("Console de Videogame", 3500.00, 4, Produto::CATEGORIA_PADRAO, Produto::STATUS_DISPONIVEL);
    $p2 = new Produto("Fone Bluetooth", 300.00, 0, Produto::CATEGORIA_PADRAO, Produto::STATUS_ESGOTADO);
    $p3 = new Produto("Smartwatch Novo", 800.00, 10, Produto::CATEGORIA_PADRAO, Produto::STATUS_EM_BREVE);

    echo $p1->exibirDetalhes() . "<br>";
    echo $p2->exibirDetalhes() . "<br>";
    echo $p3->exibirDetalhes() . "<br><br>";

    $p2->setStatus(Produto::STATUS_DISPONIVEL);
    $p2->setQuantidadeEstoque(15);
    
    echo "<strong>Após reposição de estoque do Fone:</strong><br>";
    echo $p2->exibirDetalhes() . "<br>";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}