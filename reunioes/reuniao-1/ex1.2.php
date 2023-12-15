<?php
//ESTRUTURAS DE CONTROLE

$nome1 = "José";
$idadeJose = 18;
$serieJose = 4;
$cursoJose = "meca";
$areaJose = "tecnologia";
$notaMatJose = 90;
$notaQuimicaJose = 72;
$notaFisicaJose = 80;

$nome2 = "Maria";
$idadeMaria= 18;
$serieMaria = 4;
$cursoMaria = "info";
$areaMaria = "tecnologia";
$notaMatMaria = 75;
$notaQuimicaMaria = 81;
$notaFisicaMaria = 85;

$nome3 = "João";
$idadeJoao= 19;
$serieJoao = 4;
$cursoJoao= "info";
$areaJoao = "tecnologia";
$notaMatJoao = 75;
$notaQuimicaJoao = 75;
$notaFisicaJoao = 89;
$mediaJoao = ($notaQuimicaJoao+$notaFisicaJoao+$notaMatJoao)/3;

if($idadeJoao >= 17 && $areaJoao == "tecnologia" && $serieJoao == 4 && ($mediaJoao > 80)){
    echo "<p>{$nome3}  foi chamado para uma entrevista!</p>";
} else{
    echo "<p>{$nome3} não atendeu aos critérios!</p>";

}

if($idadeMaria >= 17 && $areaMaria == "tecnologia" && $serieMaria == 4 &&
    (($notaFisicaMaria+$notaMatMaria+$notaQuimicaMaria)/3 > 80)){
    echo "<p>{$nome2}  foi chamado para uma entrevista!</p>";
} else{
    echo "<p>{$nome2}  não atendeu aos critérios!</p>";

}

if($idadeJose >= 17 && $areaJose == "tecnologia" && $serieJose == 4 &&
    (($notaFisicaJose+$notaMatJose+$notaQuimicaJose)/3 > 80)){
    echo "<p>{$nome1}  foi chamado para uma entrevista!</p>";
} else{
    echo "<p>{$nome1}  não atendeu aos critérios!</p>";
}
