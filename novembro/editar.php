<?php

require_once __DIR__ . "/Boot/Helpers.php";
require_once __DIR__ . "/Boot/Config.php";
require_once __DIR__ . "/Core/Connect.php";
require_once  __DIR__ . "/Model/User.php";
require_once  __DIR__ . "/dados-atualizados.php";

$form = new StdClass();
$form->method = "post";

$id_user = $_GET['id'];

$db = \Database\Connect::conexao();
$user = new \Model\User($db);

$usuarioAtualizar = $user->read_atualizarDeletar($id_user)[0];

$id = $usuarioAtualizar["id"];
$nome = $usuarioAtualizar["nome"];
$sobrenome = $usuarioAtualizar["sobrenome"];
$email = $usuarioAtualizar["email"];
$senha = $usuarioAtualizar["senha"];
$dataNasc = $usuarioAtualizar["data_nascimento"];
$telefone = $usuarioAtualizar["telefone"];
$email = $usuarioAtualizar["email"];


if ($usuarioAtualizar && $_POST) { //se tiver interação com o formulário

    //verificando se os campos estão vazios
    if (in_array("", $usuarioAtualizar)) {
        echo "<h1>Preencha todos os campos!</h1>";
        die();
    }

    if (validarEmail($email) == true) {

        if (validarDataNasc($dataNasc) == true) {

            if (validarTelefone($telefone) == true) {

                if (validar_senha($senha)) {
                    $senha = $usuarioAtualizar["senha"];

                    $user_ip = pegarIp();
                    $created = (new DateTime())->format(CONF_DATE_FORMAT_DB);

                    try {

                        $postArray =  filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $nome = $postArray["nome"];
                        $sobrenome = $postArray["sobrenome"];
                        $email = $postArray["email"];
                        $senha = $postArray["senha"];

                        $senhaHash = passwd($senha);

                        $dataNasc = (new DateTime($postArray['dataNascimento']))->format(CONF_DATE_FORMAT);
                        $telefone = $postArray["telefone"];
                        $email = $postArray["email"];
                        $user_ip = pegarIp();

                        //var_dump($postArray);

                        $user->atualizarUsuario($id, $nome, $sobrenome, $email, $senhaHash, $dataNasc, $telefone, $user_ip);

                        echo "<h1>Dados atualizados com sucesso! :)</h1>";

                        $usuarioAtualizar = $user->read_atualizarDeletar($id_user)[0];
                        dadosAtualizados($usuarioAtualizar);


                    } catch (\PDOException $exception){
                        echo "<h1>Erro ao atualizar</h1>";
                    }


                } else {
                    echo "<h1>Senha inválida! Tente novamente.</h1>";
                }

            } else {
                echo "<h1>Número de telefone inválido :/ Tente novamente!</h1>";
            }


        } else {
            echo "<h1>Data de nascimento inválida</h1>";

        }
    } else {
        echo "<h1>Insira um e-mail válido!</h1>";
    }
}

require __DIR__ . "/view/form-editar.php";


