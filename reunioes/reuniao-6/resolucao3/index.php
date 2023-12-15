<?php

require __DIR__ . "\source\Calculadora2.php";

$form = new StdClass();
$form->method = "post";

$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($postArray['valor1']) && isset($postArray['valor2']) && isset($postArray['operador'])) {

    $valor1 = $postArray['valor1'];
    $valor2 = $postArray['valor2'];
    $operador = $postArray['operador'];

    $calculadora = new source\Calculadora2\Calculadora2();

    $calculadora->setValor1($valor1);
    $calculadora->setValor2($valor2);


    if ($operador === "+"){
        $calculadora->somar($valor1, $valor2);
        echo "<p>O resultado é {$calculadora->getResultado()}</p>";

    } elseif ($operador === "-"){
        $calculadora->subtrair($valor1, $valor2);
        echo "<p>O resultado é {$calculadora->getResultado()}</p>";


    } elseif ($operador === "*"){
        $calculadora->multiplicar($valor1, $valor2);
        echo "<p>O resultado é {$calculadora->getResultado()}</p>";


    } elseif ($operador === "/"){
        if($valor1 == 0 & $valor2 == 0){
            echo "<p>Não é possível realizarmos essa divisão, seu valor é indeterminado</p>";

        } elseif ($valor2 == 0){
            echo "<p>É impossível realizar a divisão de um número por 0</p>";

        }else{
            $calculadora->dividir($valor1, $valor2);
            echo "<p>O resultado é {$calculadora->getResultado()}</p>";
        }

    } elseif ($operador === "mediaArit"){
        $calculadora->mediaArit($valor1, $valor2);
        echo "<p>O resultado é {$calculadora->getResultado()}</p>";

    } else{
        echo "<p class='trigger warning'>Erro inesperado</p>";
    }

}

require __DIR__ . "/form-calculadora.html";
