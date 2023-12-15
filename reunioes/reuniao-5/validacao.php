<?php

require __DIR__ . "/source/autoload.php";
require_once __DIR__ . "/validarUpload.php";
require_once __DIR__ . "/validarTelefone.php";
require_once __DIR__ . "/validarCep.php";
require_once __DIR__ . "/validarCpf.php";
require_once __DIR__ . "/calcularIdade.php";

$form = new StdClass();
$form->method = "post";

$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//$nome recebe o valor de $postArray['nome']
// se essa chave existe e tem um valor não nulo, caso contrário, recebe uma string vazia ''.

$nome = $postArray['nome'] ?? '';
$email = $postArray['email'] ?? '';
$tel = $postArray['tel'] ?? '';
$cpf = $postArray['cpf'] ?? '';
$cep = $postArray['cep'] ?? '';
$dataNascimento = new DateTime($postArray['dataNasc']);
$escolaridade = $postArray['escolaridade'] ?? '';
$genero = $postArray['genero'] ?? '';
$curriculoArquivo = $_FILES['curriculo']['name'] ?? '';

if($postArray) { //se tiver interação com o formulário
    //verificando se os campos estão vazios
    if (in_array("", $postArray)) {
        echo "<p class='trigger warning'>Preencha todos os campos!</p>";

        //VALIDAÇÃO DOS DADOS
    } elseif($dataNascimento && $dataNascimento->format('Y-m-d') === $postArray['dataNasc']){
        $idade = calcularIdade($dataNascimento);

        if ($idade < 40) {
            $anosFaltam = 40 - $idade;

            echo "<p class='trigger warning'>Idade insuficiente. Faltam {$anosFaltam} anos para você conseguir se candidatar.</p>";
            die();
        }

    } elseif (!filter_var($postArray['email'], FILTER_VALIDATE_EMAIL)){
        echo "<p class='trigger warning'>E-mail informado não é válido</p>";
        die();

    }elseif (validarTelefone($tel)){
        echo "<p class='trigger warning'>Telefone informado não é válido. Tente novamente</p>";
        die();

        //validar cpf
    }elseif (mb_strlen($cpf)){
        $cpf = validarCpf($cpf);

        if(mb_strlen($cpf) != 11){
            echo "<p class='trigger warning'>CPF informado não é válido</p>";
            die();
        }

    }elseif (mb_strlen($cep)){
        validarCep($cep);

        if(mb_strlen($cep) != 8){
            echo "<p class='trigger warning'>CEP informado não é válido</p>";
            die();
        }

    }elseif (!($uploadResult = validarUpload($_FILES['curriculo']))) {
        echo "<p class='trigger warning'>Erro ao enviar o currículo</p>";
        die();

    } else{
        echo "<p class='trigger warning'>Erro inesperado</p>";
    }
}

$nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
$uploadResult = validarUpload($_FILES['curriculo']);

    echo "<p class='trigger accept'>Cadastrado com sucesso!</p>";
    echo "<p><strong>Dados cadastrados:</strong></p>";
    echo "<ul>";
    echo "<li>Nome: {$nome}</li>";
    echo "<li>E-mail: $email</li>";
    echo "<li>Telefone: $tel</li>";
    echo "<li>CPF: $cpf</li>";
    echo "<li>Data de Nascimento: {$dataNascimento->format('d/m/Y')}</li>";
    echo "<li>Escolaridade: $escolaridade</li>";
    echo "<li>Gênero: $genero</li>";
    echo "<li>CEP: $cep</li>";
    echo "<li>Currículo: <a href='uploads/{$uploadResult}' target='_blank'>Baixar Currículo</a></li>";
    echo "</ul>";


    include_once __DIR__ . "/form-vaga-emprego.html";







