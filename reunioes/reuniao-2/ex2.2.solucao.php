<?php
//Solução do vitor, usando só a função str_replace, sem criar uma nova (mais limpo)

$cpf = '000.000.000-30';
$cnpj = '20.110.153/0001-07';


$entrada = $cpf;

//$dadoslimpo = str_replace('.','',$entrada);
//$dadoslimpo = str_replace('-','',$dadoslimpo);
//$dadoslimpo = str_replace('/','',$dadoslimpo);

$dadosLimpa = array('.','-','/');
$dadoslimpo = str_replace($dadosLimpa,'',$entrada);
//$dadoslimpo = str_replace(['.','-','/'],'',$entrada);
//$dadoslimpo = str_replace(('.','-','/'),'',$entrada);
//$dadoslimpo = str_replace(array('.','-','/'),'',$entrada);

if(strlen($dadoslimpo)  == 11){
    echo 'é cpf';
}elseif(strlen($dadoslimpo)  == 14){
    echo ' é cnpj';
}else {
    echo 'dados inválidos';
}