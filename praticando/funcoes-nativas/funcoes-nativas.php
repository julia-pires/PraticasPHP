<?php

//$form =stdClass();
//$form->method = "post";
//
//include __DIR__."/form-funcoes-nativas.html";
//
//$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$nomes = [
    "Julia",
    "Maria",
    "Amanda",
    "Ruan",
    "Renan",
    "Thiago",
    "Ayslan",
    "Daniela",
    "Josimar",
    "Bruno",
    "Caio",
    "Xuxa"
];

asort($nomes);

echo "<pre>";
print_r($nomes);
echo "</pre>";



