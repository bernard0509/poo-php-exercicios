<?php

/*
 ==============================================================================
 1. DIFERENÇA ENTRE self::$algo E $this->algo (Explicação em Comentários)
 ==============================================================================
 - $this->algo: É usado em métodos de INSTÂNCIA. Ele faz referência a um objeto 
   específico que foi criado na memória (com o operador 'new'). Cada objeto 
   possui seus próprios valores para os atributos de instância.
 
 - self::$algo: É usado em métodos ESTÁTICOS (static). Ele faz referência a uma 
   propriedade ou método que pertence à CLASSE em si, e não a um objeto específico. 
   O valor é compartilhado por todas as instâncias e a classe não precisa estar 
   instanciada para ser acessada.
*/

class TesteEscopo {
    public static string $mensagemClasse = "Sou uma propriedade estática da classe!";
    public string $mensagemObjeto = "Sou uma propriedade de instância do objeto!";

    /*
    --------------------------------------------------------------------------
    2. ERRO PROPOSITAL (Tentando usar $this dentro de um método static)
    --------------------------------------------------------------------------
    Se tentarmos descomentar a função abaixo e rodar, o PHP vai disparar este erro:
    
    "Fatal error: Uncaught Error: Using $this when not in object context in..."
    
    Motivo: Métodos estáticos pertencem à classe e rodam antes de qualquer objeto 
    existir. Por isso, o ponteiro $this não existe dentro deles.
    --------------------------------------------------------------------------
    
    public static function testeErro() {
        // ERRO PROPOSITAL:
        return $this->mensagemObjeto; 
    }
    */

    public static function testeCorrigido() {

        return self::$mensagemClasse;
    }
}

try {
    echo "<h3>Exercício 5 — Comparando self:: vs \$this</h3>";

    // Chamando o método estático corrigido direto pela classe
    echo TesteEscopo::testeCorrigido() . "<br>";
    
    echo "<br><strong>Conclusão:</strong> O erro proposital foi documentado e o código foi corrigido com sucesso!";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}