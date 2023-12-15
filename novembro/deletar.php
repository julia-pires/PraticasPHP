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

if (!empty($user->read_atualizarDeletar($id_user)[0])){


    $usuarioDeletar = $user->read_atualizarDeletar($id_user)[0];

//ver se tem usuário antes de tentar deletar
    $id = $usuarioDeletar["id"];

    try {
        $user->deletarUsuario($id);
        echo "<h1>Usuário deletado com sucesso! :)</h1>";
        $user->read();



        echo "<a href='index.php'>Cadastrar usuários</a>";

    } catch (\PDOException $exception) {
        echo "<h1>Erro ao deletar</h1>";
    }

} else{
    echo "<h1>Não há usuários para deletar</h1>";

}





