<?php

require_once __DIR__ . "/Boot/Helpers.php";
require_once __DIR__ . "/Boot/Config.php";
require_once __DIR__ . "/Core/Connect.php";
require_once  __DIR__ . "/Model/User.php";

//$pdo = new PDO("mysql:host=localhost;dbname=estudos", "root", "");
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$form = new StdClass();
$form->method = "post";

$postArray = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($postArray) { //se tiver interação com o formulário

    //verificando se os campos estão vazios
    if (in_array("", $postArray)) {
        echo "<h1>Preencha todos os campos!</h1>";
        die();
    }

    //fzr user tratarDados para pegar as coisas do post

    $nome = $postArray["nome"];
    $sobrenome = $postArray["sobrenome"];
    $email = $postArray["email"];
    $senha = $postArray["senha"];
    $dataNasc = (new DateTime($postArray['dataNascimento']))->format(CONF_DATE_FORMAT_DB);
    $telefone = $postArray["telefone"];
    //$dataNasc->setTimezone(new DateTimeZone(CONF_DATE_BR));
    //validarDataNas($dataNasc = $postArray["dataNascimento"]);


    if (validarEmail($email) == true){

        $db = \Database\Connect::conexao();
        $user = new \Model\User($db);

        if ($user->verificarEmail($email)) {
            echo "<h1>Já existe uma conta com esse e-mail!</h1>";

        } else{

            if(validarDataNasc($dataNasc) == true){

                if(validarTelefone($telefone) == true){

                    if (validar_senha($senha)){
                        $senhaHash = passwd($senha);

                        $user_ip = pegarIp();
                        $created = (new DateTime())->format(CONF_DATE_FORMAT_DB);

                        $user->inserirUsuario ($nome, $sobrenome, $email, $senhaHash, $dataNasc, $telefone, $created, $user_ip);

                        echo "<h1>Dados salvos com sucesso! :)</h1>";

                        echo $user->read();

                    } else{
                        echo "<h1>Senha inválida! Tente novamente.</h1>";
                    }

                } else{
                    echo "<h1>Número de telefone inválido :/ Tente novamente!</h1>";
                }



            } else{
                echo "<h1>Data de nascimento inválida</h1>";
            }

        }

    } else{
        echo "<h1>Insira um e-mail válido!</h1>";
    }


}

require __DIR__ . "/view/form-cadastro.php";


