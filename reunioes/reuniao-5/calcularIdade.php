<?php

function calcularIdade($dataNascimento) {
    $hoje = new DateTime("now");
    $idade = $hoje->diff($dataNascimento);
    return $idade->y; //considera apenas ano, sem meses
}
