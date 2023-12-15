<?php
//funções para string - validação de CPF e CNPJ

//É cpf, CNPJ ou informação inválida
//CPF = 11 digitos
//CNPJ = 14 digitos
//Pesquisar sobre a composição desses números

/*
 Elabore um script que deve receber uma variavel qualquer, onde deve ser validado se ele e um CPF ou CNPJ

Para testes vamos usar os dados como entrada

000.000.000-30
20.110.153.0001/07
Ao final ser impresso, se e um cpf. cnpj ou invalido
*/
echo "<h1>Solução 1:</h1>";
$valor1 = "000.000.000-30";
$valor2 = "20.110.153.0001/07";

if(mb_strlen($valor1) == 14){
    echo "<p>{$valor1} é um CPF!</p>";
} elseif (mb_strlen($valor1) == 18){
    echo "<p>{$valor1} é um CNPJ!</p>";
} else{
    echo "<p>Valor inválido</p>";
}

if(mb_strlen($valor2) == 14){
    echo "<p>{$valor2} é um CPF!</p>";
} elseif (mb_strlen($valor2) == 18){
    echo "<p>{$valor2} é um CNPJ!</p>";
} else{
    echo "<p>Valor inválido</p>";
}

//OUTRA FORMA, TIRANDO PONTOS E TRAÇOS:
echo "<h1>Solução 2:</h1>";
$v1 = "000.000.000-30";
$v2 = "20.110.153.0001/07";

//A expressão &$valor na função limpa_cpf_cnpj(&$valor)
// indica que o parâmetro $valor está sendo passado por referência.
function limpa_cpf_cnpj(&$valor){
    $valor = trim($valor); // Remove espaços em branco
    $valor = str_replace(array('.', '-', '/'), "", $valor); // Remove caracteres especiais
    return $valor;
}

(limpa_cpf_cnpj($v1));
if(mb_strlen($v1) == 11){
    echo "<p>{$v1} é um CPF!</p>";
} elseif (mb_strlen($v1) == 14){
    echo "<p>{$v1} é um CNPJ!</p>";
} else{
    echo "<p>Valor inválido</p>";
}

(limpa_cpf_cnpj($v2));
if(mb_strlen($v2) == 11){
    echo "<p>{$v2} é um CPF!</p>";
} elseif (mb_strlen($v2) == 14){
    echo "<p>{$v2} é um CNPJ!</p>";
} else{
    echo "<p>Valor inválido</p>";
}



//OUTRO EXEMPLO
echo "<h1>Solução 3:</h1>";

$string1 = "000.000.000-30";
$string2 = "20.110.153.0001/07";
function tirarCaracteresEspeciais(&$string){
//Trim retira os espaços vazios no começo e fim da variável
    $string = trim($string);
//str_replace substitui um carácter por outro, nesse caso espaço por nada
    $string = str_replace(' ', '', $string);
//Aqui substitui o underline por nada
    $string = str_replace('_', '', $string);
//Aqui retira a barra
    $string = str_replace('/', '', $string);
//Nessa linha o traço
    $string = str_replace('-', '', $string);
//A abertura de parenteses
    $string = str_replace('(', '', $string);
//O fechamento de parenteses
    $string = str_replace(')', '', $string);
//O ponto
    $string = str_replace('.', '', $string);
//No fim é retornado a variável com todas as alterações
    return $string;
}

(tirarCaracteresEspeciais($string1));
if(mb_strlen($string1) == 11){
    echo "<p>{$string1} é um CPF!</p>";
} elseif (mb_strlen($string1) == 14){
    echo "<p>{$string1} é um CNPJ!</p>";
} else{
    echo "<p>Valor inválido</p>";
}

(tirarCaracteresEspeciais($string2));
if(mb_strlen($string2) == 11){
    echo "<p>{$string2} é um CPF!</p>";
} elseif (mb_strlen($string2) == 14){
    echo "<p>{$string2} é um CNPJ!</p>";
} else{
    echo "<p>Valor inválido</p>";
}

//MAIS UM EXEMPLO, USANDO PREG_REPLACE
function formatCnpjCpf($value)
{
    $CPF_LENGTH = 11;
    $cnpj_cpf = preg_replace("/\D/", '', $value);

    if (strlen($cnpj_cpf) === $CPF_LENGTH) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    }

    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}