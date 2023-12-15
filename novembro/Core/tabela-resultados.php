<?php

function tabelaResultados($resultados) {

    echo "<h2>Usuários no banco de dados:</h2>";
    echo '<link rel="stylesheet" type="text/css" href="view/css/tabela-resultados.css">';

    // montagem do html da tabela
    $table = '<table>';
    $table .= '<thead>';

    $table .= '<tr>';
    $table .= '<td>ID</td>';
    $table .= '<td>Nome</td>';
    $table .= '<td>Sobrenome</td>';
    $table .= '<td>Email</td>';
    $table .= '<td>Data de Nascimento</td>';
    $table .= '<td>Telefone</td>';
    $table .= '<td>Created_at</td>';
    $table .= '<td>Ip do usuário</td>';
    $table .= '</tr>';

    $table .= '</thead>';
    $table .= '<tbody>';

// laço de repetição para inclusão dos dados na tabela
    foreach ($resultados as $resultado) {
        $table .= '<tr>';

        $table .= "<td>{$resultado['id']}</td>";
        $table .= " <td>{$resultado['nome']}</td>";
        $table .= "<td>{$resultado['sobrenome']}</td>";
        $table .= " <td>{$resultado['email']}</td>";
        $table .= "<td>{$resultado['data_nascimento']}</td>";
        $table .= " <td>{$resultado['telefone']}</td>";
        $table .= "<td>{$resultado['created_at']}</td>";
        $table .= "<td>{$resultado['user_ip']}</td>";

        $table .= "<td><a href='editar.php?&id={$resultado['id']}'>Editar</a></td>";
        $table .= "<td><a href='deletar.php?&id={$resultado['id']}'>Deletar</a></td>";

        $table .= '</tr>';
    }

// fecahamento do html
    $table .= '</tbody>';
    $table .= '</table>';

// exibição na tela
    return $table;

}


