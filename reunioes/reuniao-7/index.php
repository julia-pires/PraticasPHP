<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
require __DIR__ . "/source/autoload.php";
require __DIR__ . "/Filtros/limpar_e_validar_numeros.php";


$form = new StdClass();
$form->method = "post";

$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if ($postArray) { //se tiver interação com o formulário
    //verificando se os campos estão vazios
    if (in_array("", $postArray)) {
        echo "<p class='trigger warning'>Preencha todos os campos!</p>";
        die();
    }

    $nome = $postArray['nome'];
    $extratoFiltrar = $postArray['extrato'];
    $extratoFiltrado = limpar_e_validar_numero($extratoFiltrar);
    $acao = $postArray['acao'];
    $exibir = $postArray['exibir'];
    $valorFiltrar = $postArray['valor'];
    $valorFiltrado = limpar_e_validar_numero($valorFiltrar);


    if ($valorFiltrado !== null && $extratoFiltrado !== null) {

        $contaBancaria = new \Source\Banco\ContaBancaria(
            $nome,
            $extratoFiltrado,
        );


        echo "<p>Titular: {$contaBancaria->getTitular()}</p>";


        if ($acao == "deposito") {
            $contaBancaria->depositar($valorFiltrado);

            if ($exibir == "sim") {
                $contaBancaria->exibirSaldo();
            }

        } elseif ($acao == "saque") {
            $contaBancaria->sacar($valorFiltrado);

            if ($exibir == "sim") {
                $contaBancaria->exibirSaldo();
            }

        } else {
            echo "<p class='trigger warning'>Erro inesperado!</p>";
        }

    } else {
        echo "<p class='trigger warning'>Preencha novamente!</p>";
    }


}


require __DIR__ . "/form-conta-bancaria.html";







