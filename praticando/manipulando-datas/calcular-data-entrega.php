<?php
$form = new StdClass();
$form->method = "post";
include __DIR__."/formulario.html";
include __DIR__."/tratamento-data.php";

//se existir dados no formulario:
if (isset($_POST['dataPagamento']) && isset($_POST['tipoEnvio'])) {
    $postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (strtotime($postArray['dataPagamento']) === false) {
        echo "Data de pagamento inválida";
    }

    if($postArray['tipoEnvio'] == "Expresso"){
        $postArray['dataPagamento'] -> date(DATE_BR, strtotime("+2days"));

        var_dump($_POST['dataPagamento']);
        var_dump($_POST['tipoEnvio']);
        die();

        echo "A data de entrega será em {$postArray['dataPagamento']}";

    } elseif ($postArray['tipoEnvio'] == "Normal"){
        $postArray['dataPagamento'] = date(DATE_BR, strtotime("+5days"));
        echo "A data de entrega será em {$postArray['dataPagamento']}";

    } else{
        echo "<p>Ocorreu um problema inesperado, volte mais tarde!</p>";
    }

} else{
    echo
    "<p class='trigger warning'>
    Preencha o com as informações sobre o pagamento e o tipo de envio da sua compra!
    </p>";
}




