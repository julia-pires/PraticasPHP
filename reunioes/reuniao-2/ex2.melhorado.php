<?php

//instanciar o form:
$form = new StdClass();
$form->method = "post";

//depois de instanciar o formulário, e ele passar a existir, incluir ele no código:
include __DIR__."/ex2.melhorado.form.html";

$expVidaBrasil = 86;
$custoGovernoBrasil = 15000;
$custoGovInicial = 0;

$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ( isset($postArray['nome']) && isset($postArray['idadeAposentadoria'])) {

    $idadeAposentadoria = $postArray['idadeAposentadoria'];

    while($idadeAposentadoria <= $expVidaBrasil){
        $custoGovInicial = $custoGovernoBrasil + $custoGovInicial;
        $idadeAposentadoria++;
    }
    echo "<p>O governo gastará R$ {$custoGovernoBrasil}  reais ao final do ciclo de uma vida com aposentadoria</p>";

    if($idadeAposentadoria > $custoGovInicial) {

        echo "<p class='trigger warning'>Não será possível calcularmos quanto o Governo gastará 
        pois a idade em que começou a receber a aposentadoria é maior que a expectativa de vida.</p>";

    }

} else{
    echo "<p>Preencha o campo!</p>";
}



