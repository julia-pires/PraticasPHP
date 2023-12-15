<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="view/css/form-cadastro.css">


    <title>Atualizar cadastro</title>
</head>
<body>

<h2>Atualizar cadastro</h2>
<form id="formulario" method="<?= $form->method; ?>" enctype="multipart/form-data">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" pattern="^[a-zA-Z]+$" value="<?= $usuarioAtualizar["nome"]; ?>"/><br/><br/>

    <label for="sobrenome">Sobrenome:</label>
    <input type="text" id="sobrenome" name="sobrenome" value="<?= $usuarioAtualizar["sobrenome"]; ?>"/><br/><br/>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= $usuarioAtualizar["email"]; ?>"/><br/><br/>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" /><br/><br/>

    <label for="dataNascimento">Data de Nascimento:</label>
    <input type="date" id="dataNascimento" name="dataNascimento" value="<?= $usuarioAtualizar["data_nascimento"]; ?>"/><br/><br/>

    <label for="telefone">Telefone:</label>
    <input type="tel" id="telefone" name="telefone" pattern="[0-9]+" value="<?= $usuarioAtualizar["telefone"]; ?>"/><br/><br/>

    <input type="submit" value="Atualizar">
</form>
</body>
</html>
