<?php

$eUmPalindromo = [
    "Ana",
    "Onibus",
    "Gente",
    "Osso",
    "Radar",
    "Pastel",
    "Renner",
    "Ovo"
];

foreach ($eUmPalindromo as $item){

    $invertido = strrev ( $item);

    if(strtolower($item) === strtolower($invertido)){
        echo "<p>{$item} é um palíndromo!</p>";
    } else{
        echo "<p>{$item} não é um palíndromo!</p>";
    }
}
