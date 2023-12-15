<?php
require __DIR__."/calculadora.php";

$num1 = $_POST["num1"];
$num2 = $_POST["num2"];
$operacao = $_POST["operacao"];

calculadoraBasica($num1, $num2, $operacao);
