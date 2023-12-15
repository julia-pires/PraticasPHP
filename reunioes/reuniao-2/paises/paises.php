<?php
function paises($string) {

    if ($string === 'Alemanha') {
        return array(
            'nome' => 'Alemanha',
            'moeda' => 'euros',
            'expVida' => 81,
            'custoGoverno' => 80100);

    } elseif ($string === 'Argentina') {
        return array(
            'nome' => 'Argentina',
            'moeda' => 'pesos argentinos',
            'expVida' => 76,
            'custoGoverno' => 14569);

    } elseif ($string === 'Austrália') {
        return array(
            'nome' => 'Austrália',
            'moeda' => 'dólares australianos',
            'expVida' => 83,
            'custoGoverno' => 24861);

    } elseif ($string === 'Áustria') {
        return array(
            'nome' => 'Áustria',
            'moeda' => 'euros',
            'expVida' => 82,
            'custoGoverno' => 16800);

    } elseif ($string === 'Brasil') {
        return array(
            'nome' => 'Brasil',
            'moeda' => 'reais',
            'expVida' => 77,
            'custoGoverno' => 15000);

    } elseif ($string === 'Canadá') {
        return array(
            'nome' => 'Canadá',
            'moeda' => 'dólares canadenses',
            'expVida' => 82,
            'custoGoverno' => 9600);

    } elseif ($string === 'Dinamarca') {
        return array(
            'nome' => 'Dinamarca',
            'moeda' => 'coroas dinamarquesas',
            'expVida' => 82,
            'custoGoverno' => 58430);

    } elseif ($string === 'Estados Unidos') {
        return array(
            'nome' => 'Estados Unidos',
            'moeda' => 'dólares americanos',
            'expVida' => 76,
            'custoGoverno' => 21924);

    } elseif ($string === 'Holanda') {
        return array(
            'nome' => 'Holanda',
            'moeda' => 'euros',
            'expVida' => 82,
            'custoGoverno' => 15248);

    } elseif ($string === 'Irlanda') {
        return array('nome' => 'Irlanda',
            'moeda' => 'euros',
            'expVida' => 82,
            'custoGoverno' => 10930);

    } elseif ($string === 'Luxemburgo') {
        return array(
            'nome' => 'Luxemburgo',
            'moeda' => 'euros',
            'expVida' => 81,
            'custoGoverno' => 22713);

    } elseif ($string === 'Nova Zelândia') {
        return array(
            'nome' => 'Nova Zelândia',
            'moeda' => 'dólares neozelandeses',
            'expVida' => 82,
            'custoGoverno' => 17996);

    } elseif ($string === 'Noruega') {
        return array(
            'nome' => 'Noruega',
            'moeda' => 'coroas norueguesas',
            'expVida' => 83,
            'custoGoverno' => 24204);

    } elseif ($string === 'Portugal') {
        return array(
            'nome' => 'Portugal',
            'moeda' => 'euros',
            'expVida' => 77,
            'custoGoverno' => 7980);

    } elseif ($string === 'Suécia') {
        return array(
            'nome' => 'Suécia',
            'moeda' => 'coroas suecas',
            'expVida' => 82,
            'custoGoverno' => 28680);
    }

    return null;
}
