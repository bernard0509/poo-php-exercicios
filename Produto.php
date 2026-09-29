<?php

class Produto {
    // Constantes de classe
    public const CATEGORIA_PADRAO = "Geral";
    public const DESCONTO_MAXIMO_PERMITIDO = 50.0;
    public const STATUS_DISPONIVEL = "Disponível";
    public const STATUS_ESGOTADO = "Esgotado";

    // Propriedades estáticas
    public static int $totalProdutos = 0;
    public static int $estoqueTotal = 0;
    
    // --- NOVO: Array estático para armazenar todas as instâncias (Exercício 9) ---
    private static array $todos = [];

    // Atributos privados
    private string $nome;
    private float $preco;
    private int $quantidadeEstoque;
    private string $categoria;
    private string $status;

    // Construtor
    public function __construct(string $nome, float $preco, int $quantidadeEstoque, string $categoria = self::CATEGORIA_PADRAO, string $status = self::STATUS_DISPONIVEL) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setQuantidadeEstoque($quantidadeEstoque);
        $this->setCategoria($categoria);
        $this->setStatus($status);

        // Atualizando os contadores estáticos
        self::$totalProdutos++;
        self::$estoqueTotal += $this->quantidadeEstoque;

        // --- NOVO: Auto-registra a instância atual no array estático (Exercício 9) ---
        self::$todos[] = $this;
    }

    // Método fábrica estático
    public static function criarProdutoPadrao(): self {
        return new self("Produto Genérico", 10.00, 1);
    }

    // --- NOVO: Método estático para listar todos os objetos salvos (Exercício 9) ---
    public static function listarTodos(): void {
        if (empty(self::$todos)) {
            echo "Nenhum produto cadastrado.<br>";
            return;
        }

        foreach (self::$todos as $produto) {
            echo $produto->exibirDetalhes() . "<br>";
        }
    }

    public function aplicarDescontoEspecial(float $percentual): float {
        if ($percentual > self::DESCONTO_MAXIMO_PERMITIDO) {
            throw new InvalidArgumentException("O desconto excede o limite de " . self::DESCONTO_MAXIMO_PERMITIDO . "%");
        }
        $valorDesconto = $this->preco * ($percentual / 100);
        return $this->preco - $valorDesconto;
    }

    // --- GETTERS E SETTERS ---

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = trim($nome);
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function setPreco(float $preco): void {
        if ($preco < 0) {
            throw new InvalidArgumentException("O preço não pode ser negativo.");
        }
        $this->preco = $preco;
    }

    public function getQuantidadeEstoque(): int {
        return $this->quantidadeEstoque;
    }

    public function setQuantidadeEstoque(int $quantidadeEstoque): void {
        if ($quantidadeEstoque < 0) {
            throw new InvalidArgumentException("A quantidade em estoque não pode ser negativa.");
        }
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): void {
        $this->categoria = empty(trim($categoria)) ? self::CATEGORIA_PADRAO : trim($categoria);
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    public function exibirDetalhes(): string {
        return "Produto: {$this->nome} | Categoria: {$this->categoria} | Status: {$this->status} | Preço: R$ " . number_format($this->preco, 2, ',', '.') . " | Estoque: {$this->quantidadeEstoque} un.";
    }
}