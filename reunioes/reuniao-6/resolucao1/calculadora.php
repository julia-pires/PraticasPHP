<?php

$form = new StdClass();
$form->method = "post";

$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($postArray['valor1']) && isset($postArray['valor2']) && isset($postArray['operador'])) {

    if ($postArray !== false) {
        // O valor foi filtrado para conter apenas números inteiros
        //retorna verdadeiro pq filtrou e temos apenas numeros inteiros

    }
    $valor1 = $postArray['valor1'];
    $valor2 = $postArray['valor2'];
    $operador = $postArray['operador'];
    $resultado = 0;

    if ($operador === "+"){
        $resultado = $valor1 + $valor2;
        echo "<p>O resultado é {$resultado}</p>";

    } elseif ($operador === "-"){
        $resultado = $valor1 - $valor2;
        echo "<p>O resultado é {$resultado}</p>";


    } elseif ($operador === "*"){
        $resultado = $valor1 * $valor2;
        echo "<p>O resultado é {$resultado}</p>";


    } elseif ($operador === "/"){
        if($valor1 & $valor2 == 0){
            echo "<p>Não é possível realizarmos uma divisão por 0</p>";

        } elseif ($valor2 == 0){
            echo "<p>É impossível realizar a divisão de um número por 0, o resultado é indefinido</p>";

        }else{
            $resultado = $valor1 / $valor2;
            echo "<p>O resultado é {$resultado}</p>";
        }

    }

} else{
    echo "<p>Os valores não estão sendo recebidos corretamente</p>";
}


require __DIR__ . "/form-calculadora.html";
