<?php

$form = new StdClass();
$form->method = "post";


$upload = __DIR__."/uploads";
if(!file_exists($upload) || !is_dir($upload)){
    mkdir($upload, 0755); //0755 integridade da pasta, segurança, acesso adm
}

//pegando a informação do formulário
$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

//var_dump($getPost);
//var_dump($_FILES['file']);

if($_FILES && !empty($_FILES['file']['name'])){
    //se tiver um arquivo e ele nao estiver vazio (pq tem o indice e o nome)
    //$fileUpload = $postForm;
    $fileUpload = $_FILES['file']; //indice file pq é oq vamos estar recebendo no forms
    //é um array

    $tiposAceitos = [
        //sao mime types
        //tipos de arquivos que aceitamos
        "image/jpg",
        "image/jpeg",
        "image/png",
        "application/pdf"
    ];


    //para sabermos se o arquivo foi enviado:
    $nomeArquivo = time() . mb_strstr($fileUpload['name'], ".");
    //nome do arquivo time() + extensao

    //mb_strstr (onde vai ser realizada a busca (oq vamos procurar), oq queremos encontrar dentro do nome
    // (o ponto p pegar a extensão);

    //se dentro do array, no indice tipo, for do tipo que é permitido
    if(in_array($fileUpload['type'], $tiposAceitos)){

        //e se o upload de um arquivo for válido
        //pegaremos o arquivo no seu caminho temporário (tmp_name) e moveremos para
        //uploads com o nome do arquivo
        if(move_uploaded_file($fileUpload['tmp_name'], __DIR__."/uploads/{$nomeArquivo}")){
            echo "<p class='trigger accept'>Arquivo enviado com sucesso!</p>";

        } else{
            echo "<p class='trigger error'>Erro inesperado!</p>";

        }
    } else{
        echo "<p class='trigger error'>Tipo de arquivo não permitido!</p>";

    }
} elseif ($getPost){
    //se ultrapassar o limite de tamanho - interagiu com o formulario mas n tem dados
    echo "<p class='trigger warning'>Whoops, parece que o arquivo é muito grande!</p>";

}else{
    //se eu n interagir e n existir arquivo, n faz nd
    if ($_FILES){
        var_dump($_FILES);
        //se eu interagir e n existir arquivo
        echo "<p class='trigger warning'>Selecione um arquivo antes de enviar!</p>";
    }
}

//header (« Content-type: image/jpg »);

include __DIR__."/form-upload.html";


