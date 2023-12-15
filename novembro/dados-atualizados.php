<?php
function dadosAtualizados($resultado) {
    echo "<h2>Dados atualizados:</h2>";
    echo '<link rel="stylesheet" type="text/css" href="view/css/tabela-resultados.css">';

    // html da tabela
    $table = '<table>';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<td>ID</td>';
    $table .= '<td>Nome</td>';
    $table .= '<td>Sobrenome</td>';
    $table .= '<td>Email</td>';
    $table .= '<td>Data de Nascimento</td>';
    $table .= '<td>Telefone</td>';
    //$table .= '<td>Created_at</td>';
    $table .= '<td>Ip</td>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    // Process a single user
    $table .= '<tr>';
    $table .= "<td>{$resultado['id']}</td>";
    $table .= "<td>{$resultado['nome']}</td>";
    $table .= "<td>{$resultado['sobrenome']}</td>";
    $table .= "<td>{$resultado['email']}</td>";
    $table .= "<td>{$resultado['data_nascimento']}</td>";
    $table .= "<td>{$resultado['telefone']}</td>";
    //$table .= "<td>{$resultado['created_at']}</td>";
    $table .= "<td>{$resultado['user_ip']}</td>";

    $table .= "<td><a href='editar.php?&id={$resultado['id']}'>Editar</a></td>";
    $table .= "<td><a href='deletar.php?&id={$resultado['id']}'>Deletar</a></td>";
    $table .= '</tr>';

    $table .= '</tbody>';
    $table .= '</table>';
    echo $table;
}

