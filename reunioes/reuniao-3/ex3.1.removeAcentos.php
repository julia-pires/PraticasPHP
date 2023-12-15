<?php
// Função para remover acentos de uma string
function removeAcentos($string) {

    //Mapeamento de um caractere, em termos gerais, refere-se à associação de um
    // caractere de origem a um caractere de destino. Em outras palavras,
    // é uma relação que especifica como um determinado caractere ou conjunto de caracteres
    // será transformado em outro(s) caractere(s).

    $map = [
        'á' => 'a', 'ã' => 'a', 'â' => 'a',
        'é' => 'e', 'ê' => 'e',
        'í' => 'i',
        'ó' => 'o', 'õ' => 'o', 'ô' => 'o',
        'ú' => 'u',

        'Á' => 'A', 'Ã' => 'A', 'Â' => 'A',
        'É' => 'E', 'Ê' => 'E',
        'Í' => 'I',
        'Ó' => 'O', 'Õ' => 'O', 'Ô' => 'O',
        'Ú' => 'U',
    ];

    return strtr($string, $map);
}

