<?php
//Uma pessoa tem expectativa de viver até os 86 anos no Brasil e a expectativa de se aposentar é aos 64 anos.
//Considerando que o governo vai pagar por ano 15 mil reais a uma pessoa,
//qual o gasto do governo ao final do ciclo de uma vida com aposentadoria ( considerando os dados acima )?

$expVida1 = 86;
$aposentadoria1 = 64;
$custoGoverno1 = 15000;
$custoGoverno = 0;

while($aposentadoria1 <= $expVida1){
    $custoGoverno = $custoGoverno1 + $custoGoverno;
    $aposentadoria1++;
}
echo "<p>O governo gastará R$ {$custoGoverno}  reais ao final do ciclo de uma vida com aposentadoria</p>";


//AGORA COM O FOR
$expVida2 = 86;
$aposentadoria2 = 64;

$custoGoverno2 = 0;
$custoGoverno3 = 15000;

//fazendo a conta da diferença:
$recebendoAposentadoria = $expVida2 - $aposentadoria2;

/*for($c = 0; $c <= $recebendoAposentadoria; $c++){
    $custoGoverno2 = $custoGoverno3 + $custoGoverno2;
}
echo "<p>O governo gastará R$ {$custoGoverno2}  reais ao final do ciclo de uma vida com aposentadoria</p>";
*/

//sem fazer a conta da diferença:
for($c = $aposentadoria2; $c <= $expVida2; $c++){
    $custoGoverno2 = $custoGoverno3 + $custoGoverno2;
}
echo "<p>O governo gastará R$ {$custoGoverno2}  reais ao final do ciclo de uma vida com aposentadoria</p>";

/* Exemplo vitor:
$custoGoverno2 = 0;
$custoGoverno3 = 15000;
$aposento = 64;
$expecVida = 86;


for($aposento ; $aposento <= $expecVida ; $aposento++){
    $custoGoverno2 += $custoGoverno3;
}
    echo $custoGoverno2;
*/