<?php

require __DIR__ . "\source\Calculadora.php";

$form = new StdClass();
$form->method = "post";

$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($postArray['valor1']) && isset($postArray['valor2']) && isset($postArray['operador'])) {

    $valor1 = $postArray['valor1'];
    $valor2 = $postArray['valor2'];
    $operador = $postArray['operador'];

    $calculadora = new Calculadora();

    $calculadora->setValor1($valor1);
    $calculadora->setValor2($valor2);


    if ($operador === "+"){
        $calculadora->somar();
        echo "<p>O resultado é {$calculadora->getResultado()}</p>";

    } elseif ($operador === "-"){
        $calculadora->subtrair();
        echo "<p>O resultado é {$calculadora->getResultado()}</p>";


    } elseif ($operador === "*"){
        $calculadora->multiplicar();
        echo "<p>O resultado é {$calculadora->getResultado()}</p>";


    } elseif ($operador === "/"){
        if($valor1 == 0 & $valor2 == 0){
            echo "<p>Não é possível realizarmos essa divisão, seu valor é indeterminado</p>";

        } elseif ($valor2 == 0){
            echo "<p>É impossível realizar a divisão de um número por 0</p>";

        }else{
            $calculadora->dividir();
            echo "<p>O resultado é {$calculadora->getResultado()}</p>";
        }

    } elseif ($operador === "mediaArit"){
        $calculadora->mediaArit();
        echo "<p>O resultado é {$calculadora->getResultado()}</p>";

    } else{
        echo "<p class='trigger warning'>Erro inesperado</p>";
    }

}

require __DIR__ . "/form-calculadora.html";
