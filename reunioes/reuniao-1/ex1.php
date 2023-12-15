<?php
//ESTRUTURAS DE CONTROLE

$jose = [
    "nome" => "José",
    "idade" => "18",
    "serie" => "4",
    "curso" => "meca",
    "area" => "tec",
    "notaMat" => "90",
    "notaFisica" => "80",
    "notaQuimica" => "72"
];

$maria = [
    "nome" => "Maria",
    "idade" => "18",
    "serie" => "4",
    "curso" => "info",
    "area" => "tec",
    "notaMat" => "75",
    "notaFisica" => "85",
    "notaQuimica" => "81"
];

$joao = [
    "nome" => "João",
    "idade" => "19",
    "serie" => "4",
    "curso" => "info",
    "area" => "tec",
    "notaMat" => 75,
    "notaFisica" => 89,
    "notaQuimica" => 75,
];

//$joao["media"] =  ($joao["notaMat"] + $joao["notaFisica"] + $joao["notaQuimica"])/3;
//$jose["media"] =  ($jose["notaMat"] + $jose["notaFisica"] + $jose["notaQuimica"])/3;
//$maria["media"] =  ($maria["notaMat"] + $maria["notaFisica"] + $maria["notaQuimica"])/3;
$mediaJoao = ($joao["notaMat"] + $joao["notaFisica"] + $joao["notaQuimica"])/3;
$mediaMaria = ($maria["notaMat"] + $maria["notaFisica"] + $maria["notaQuimica"])/3;
$mediaJose = ($maria["notaMat"] + $maria["notaFisica"] + $maria["notaQuimica"])/3;

if($jose["idade"] >= 17 && $jose["area"] == "tec" && $jose["serie"] == 4 && $mediaJose > 80){
    echo "<p>{$jose["nome"]} foi chamado para uma entrevista!</p>";
} else{
    echo "<p>{$jose["nome"]} não atendeu aos critérios!</p>";
}

if($maria["idade"] >= 17 && $maria["area"] == "tec" && $maria["serie"] == 4 && $mediaMaria > 80){
    echo "<p>{$maria["nome"]} foi chamado para uma entrevista!</p>";
} else{
    echo "<p>{$maria["nome"]} não atendeu aos critérios!</p>";
}

if($joao["idade"] >= 17 && $joao["area"] == "tec" && $joao["serie"] == 4 && $mediaJoao  > 80){
    echo "<p>{$joao["nome"]} foi chamado para uma entrevista!</p>";
} else{
    echo "<p>{$joao["nome"]} não atendeu aos critérios!</p>";
}










