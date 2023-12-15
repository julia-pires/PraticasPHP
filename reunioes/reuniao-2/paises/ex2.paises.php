<?php

$form = new StdClass();
$form->method = "post";

include __DIR__ . "/ex2.form.paises.html";
include __DIR__ . "/paises.php";

$custoGovInicial = 0;

$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if ( isset($postArray['nome']) && isset($postArray['idadeAposentadoria']) && isset($postArray['pais'])) {

    $nome = $postArray['nome'];
    $idadeAposentadoria = $postArray['idadeAposentadoria'];
    $paisArray = $postArray['pais'];
    $pais = paises($paisArray);


    while($idadeAposentadoria <= $pais['expVida']){
        $custoGovInicial = $pais['custoGoverno'] + $custoGovInicial;
        $idadeAposentadoria++;
    }

    echo "<p>O governo do(a) {$pais['nome']} gastará R$ {$custoGovInicial} {$pais['moeda']} ao final 
    aproximado da vida de aposentadoria de {$nome}</p>";

    if($idadeAposentadoria > $custoGovInicial) {

        echo "<p class='trigger warning'>Não será possível calcularmos quanto o Governo gastará 
        pois a idade em que começou a receber a aposentadoria é maior que a expectativa de vida.</p>";

    }

} else{
    echo "<p>Preencha os campos corretamente</p>";
}