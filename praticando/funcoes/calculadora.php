<?php

function calculadoraBasica($num1, $num2, $operacao){
    $resultado = 0;

    if($resultado == 0) {
        if (strcasecmp($operacao, "soma") === 0) {
            $resultado = $num1 + $num2;
        }

        elseif (strcasecmp($operacao, "subtração") === 0) {
            $resultado = $num1 - $num2;
        }

        elseif (strcasecmp($operacao, "multiplicação") === 0) {
            $resultado = $num1 * $num2;
        }
        
        elseif (strcasecmp($operacao, "divisão") === 0) {
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                echo "<p>Erro: divisão por zero.</p>";
            }
        }

        echo "<p>O resultado da {$operacao} entre {$num1} e {$num2} é: {$resultado}</p>";
    } else{
        echo "<p>Operação inválida. Tente novamente!</p>";
    }

    return $resultado;
}