<?php

function validarCep(&$cep){

    $cep = trim($cep); // Remove espaços em branco
    $cpf = str_replace(array('.', '-', '/'), "", $cpf); // Remove caracteres especiais
    return $cpf;
}