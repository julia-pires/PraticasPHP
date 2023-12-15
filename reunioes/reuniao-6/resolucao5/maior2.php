<?php

require __DIR__ . "\source\Calculadora4.php";

$form = new StdClass();
$form->method = "post";

$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_NUMBER_INT);

if($postArray) {

    if (isset($postArray)) {

        if ($postArray !== false) {

            if ($postArray === "") {
                echo "<p class='trigger warning'>O valor inserido não é um número, então o consideraremos como 0.</p>";
            }

            $valor1 = (int)$postArray['valor1'];
            $valor2 = (int)$postArray['valor2'];
            $operador = $postArray['operador'];
            $resultado = 0;

            $calculadora = new source\Calculadora4\Calculadora4();

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
            }

        } else {
            echo "<p>O campo inserido não é um valor númerico. Tente novamente!</p>";
        }
    }else{
        echo "<p class='trigger error'>Erro ao receber dados do formulário. Tente novamente mais tarde</p>";
    }

}

require_once __DIR__ . "/form-calculadora1.html";

