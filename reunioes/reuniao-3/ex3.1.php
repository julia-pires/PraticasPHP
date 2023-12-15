<?php

$form = new StdClass();
$form->method = "post";

include __DIR__."/formulario-festa.html";
include __DIR__."/ex3.1.removeAcentos.php";

$listaConvidados = [
    "convidado1" => "Weslley",
    "convidado2" => "Daniele",
    "convidado3" => "Vitor",
    "convidado4" => "Cleber",
    "convidado5" => "Bruno",
    "convidado6" => "Guilherme",
    "convidado7" => "Julia",
    "convidado8" => "Kailayne",
];

//pega a informacao atraves de filtro, n post
$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($postArray['nome'])) {

    //strip_tags remove todo o codigo da string informada
    $saveStrip = array_map("strip_tags", $postArray);
    //trim remove espaços desnecessarios
    $saveArray = array_map("trim", $saveStrip);

    //deixando tudo em minúsculo
    $nomeMinusculo = array_map("mb_strtolower", $saveArray);
    $listaConvidadosMinunsculo = array_map("mb_strtolower", $listaConvidados);


    //removendo acentos
    $nomeInformado = removeAcentos($nomeMinusculo['nome']);
    $listaConvidados = array_map("removeAcentos",$listaConvidadosMinunsculo);


    if (in_array($nomeInformado, $listaConvidados)) {
        echo "<p>Seu nome se encontra na lista de convidados!</p>";
    } else {
        echo "<p>Seu nome não se encontra na lista de convidados!</p>";
    }
} else {
    echo "<p class='trigger warning'>Preencha o campo!</p>";
}
