<?php

function validarTelefone($telefone) {
    // Remove todos os caracteres que não são dígitos
    $telefone = preg_replace('/[^0-9]/', '', $telefone);
    // os / indicam comeco e final da expressão
    // ^ é a negação do que vem a seguir
    // substituir tudo por '' vazio
    //na variavel telefone

    // Define uma expressão regular para validar o formato do telefone
    $padrao = '/^[0-9]{11}$/';;
    //^: Isso indica o início da linha
    //[0-9]:  classe de caracteres [0-9] representa qualquer dígito de 0 a 9
    //{11}: 11 ocorrências dessa classe de caracteres consecutivas.
    //$: Isso indica o final da linha.

    //O primeiro dígito deve estar entre 2 e 9.
    //Os próximos 9 dígitos devem ser quaisquer dígitos numéricos (de 0 a 9).

    // Verifica se o número de telefone corresponde ao padrão
    return preg_match($padrao, $telefone);
}


