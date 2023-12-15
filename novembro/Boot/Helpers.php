<?php

/**
 * ####################
 * ###   VALIDATE   ###
 * ####################
 */
//function validarForm(array $postForm)
//{
//    if ($postForm) { //se tiver interação com o formulário
//
//        //verificando se os campos estão vazios
//        if (in_array("", $postForm)) {
//            echo "<p>Preencha todos os campos!</p>";
//            die();
//        }
//    } else{
//        echo "<p>Preencha o formulário!</p>";
//    }
//}

function validarDataNasc($dataNasc)
{
    $dataNascObj = new DateTime($dataNasc);
    $dataAtual = new DateTime();

    //Ao usar $diferenca->invert, você está verificando se a diferença entre as
    // datas é negativa, indicando que a data de nascimento é maior que a data atual.
    return $dataAtual->diff($dataNascObj)->invert;

    //return $dataAtual->diff($dataNascObj)->invert == 0
    // retorna true se a data de nascimento for menor ou igual à data atual e false se for maior.
}



function validarEmail (string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}


function validarTelefone($telefone)
{
    // Remove todos os caracteres que não são dígitos
    $telefone = preg_replace('/[^0-9]/', '', $telefone);
    // os / indicam comeco e final da expressão
    // ^ é a negação do que vem a seguir
    // substituir tudo por '' vazio
    //na variavel telefone

    // Define uma expressão regular para validar o formato do telefone
    $padrao = '/^[0-9]{11}$/';;
    //^: Isso indica o início da linha
    //[0-9]:  classe de caracteres [0-9] representa qualquer dígito de 0 a 9
    //{11}: 11 ocorrências dessa classe de caracteres consecutivas.
    //$: Isso indica o final da linha.

    //O primeiro dígito deve estar entre 2 e 9.
    //Os próximos 9 dígitos devem ser quaisquer dígitos numéricos (de 0 a 9).

    // Verifica se o número de telefone corresponde ao padrão
    return preg_match($padrao, $telefone);
}

function validar_senha(string $password): bool
{
    if (password_get_info($password)['algo'] ||
        (mb_strlen($password) >= CONF_PASSWD_MIN_LEN && mb_strlen($password) <= CONF_PASSWD_MAX_LEN)) {
        return true;
    }

    return false;
}



/**
 * ####################
 * ######   IP   ######
 * ####################
 */

function pegarIp() {
    $ip_address = '';

    // Se o usuário estiver por trás de um proxy, use o endereço IP fornecido pelo proxy
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        //http client é cabeçalho e oferece muitos riscos de segurança
    }
    // Se o usuário estiver por trás de um proxy e o IP real estiver presente no cabeçalho HTTP_X_FORWARDED_FOR
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Caso contrário, use o endereço IP do cliente diretamente
    else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }

//    $ip_address = filter_input(INPUT_SERVER, REMOTE_ADDR, FILTER_VALIDATE_IP);

    return $ip_address;
}



/**
 * ####################
 * ###   PASSWORD   ###
 * ####################
 */
function passwd(string $password): string
{

    //Se a senha não estiver hasheada esta parte gera um novo hash para a senha usando a função password_hash.
    // CONF_PASSWD_ALGO e CONF_PASSWD_OPTION que determinam o algoritmo e as opções a serem usadas para gerar o hash.

    return password_hash($password, CONF_PASSWD_ALGO, CONF_PASSWD_OPTION);

    //A função retorna o hash gerado.

}




