<?php

$form = new StdClass();
$form->method = "post";

include __DIR__."/formulario-festa.html";

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

//se existir dados no formulario:
if ( isset($postArray['nome'])) {
    //$postArray['nome'] = FILTER_SANITIZE_SPECIAL_CHARS;

    //strip_tags remove todo o codigo da string informada
    $saveStrip = array_map("strip_tags", $postArray);
    //trim remove espaços desnecessarios
    $save = array_map("trim", $saveStrip);

    //in_array($save['nome'], $listaConvidados, true)

    if(in_array(mb_strtolower($save['nome']), array_map("mb_strtolower", $listaConvidados))){
        echo "<p>Seu nome se encontra na lista de convidados!</p>";

    } else{
        echo "<p>Seu nome não se encontra na lista de convidados!</p>";
    }
}

else{
    echo "<p class='trigger warning'>Preencha o campo!</p>";
}

//strcasecmp - desconsiderar a diferença entre palavras com acentos e palavras sem acentos (n funcionou)