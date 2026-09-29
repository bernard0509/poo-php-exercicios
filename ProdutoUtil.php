<?php

class ProdutoUtil {
    public static function formatarMoeda(float $valor): string {
        return "R$ " . number_format($valor, 2, ',', '.');
    }

    public static function calcularDesconto(float $preco, float $percentualDesconto): float {
        $desconto = $preco * ($percentualDesconto / 100);
        return $preco - $desconto;
    }
}