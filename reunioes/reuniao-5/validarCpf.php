<?php

function validarCpf(&$cpf){
    $cpf = trim($cpf); // Remove espaços em branco
    $cpf = str_replace(array('.', '-', '/'), "", $cpf); // Remove caracteres especiais
    return $cpf;
}

