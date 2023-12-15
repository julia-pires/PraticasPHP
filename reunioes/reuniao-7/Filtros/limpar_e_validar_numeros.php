<?php

function limpar_e_validar_numero($valor) {
    $numero = trim($valor); // Remover espaços em branco no início e no fim
    $numero = str_replace(array('.', '-', '/'), "", $numero);

    if (is_numeric($numero)) {
        return $numero;
    } else {
        echo "<p class='trigger warning'>Entrada inválida. Insira um valor numérico.</p>";
        return null;
    }
}
