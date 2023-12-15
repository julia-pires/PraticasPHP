<?php

namespace Model;

require_once __DIR__ . "/../Core/tabela-resultados.php";

/**
 * User
 */
class User
{
    /** @var */
    private $db;

    /** @param $db */
    public function __construct($db)
    {
        $this->db = $db;
    }


    /***
     * VERIFICAR EMAIL
     * @param $email
     * @return bool
     */
    public function verificarEmail($email)
    {
        $query = "SELECT COUNT(*) as total FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $resultado['total'] > 0;
    }


    /***
     * USER INSERT
     * @param $nome
     * @param $sobrenome
     * @param $email
     * @param $senha
     * @param $dataNasc
     * @param $telefone
     * @param $created
     * @param $ip
     * @return void
     */
    public function inserirUsuario($nome, $sobrenome, $email, $senha, $dataNasc, $telefone, $created, $ip)
    {
        // Verificar se o e-mail já está cadastrado

        $insert = "INSERT INTO users 
                (nome, sobrenome, email, senha, data_nascimento, telefone, created_at, user_ip)
                VALUES
                (:nome, :sobrenome, :email, :senha, :data_nascimento, :telefone, :created_at, :user_ip)";

        $stmt = $this->db->prepare($insert);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':data_nascimento', $dataNasc);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':created_at', $created);
        $stmt->bindParam(':user_ip', $ip);


        try {
            $stmt->execute();
            //echo "<h1>Dados salvos com sucesso! :)</h1>";
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function atualizarUsuario($id, $nome, $sobrenome, $email, $senha, $dataNasc, $telefone, $ip)
    {
        // Verificar se o e-mail já está cadastrado

        $update = "UPDATE users SET nome = '{$nome}', sobrenome = '{$sobrenome}', email = '{$email}', senha = '{$senha}',
                 data_nascimento = '{$dataNasc}', telefone = '{$telefone}', user_ip = '{$ip}'
             WHERE id= {$id}";

        $stmt = $this->db->prepare($update);

        return $stmt->execute();

    }

    public function deletarUsuario($id)
    {

        $delete = "DELETE FROM users WHERE id= {$id}";
        $stmt = $this->db->prepare($delete);

        return $stmt->execute();

    }

    public function read_atualizarDeletar($id)
    {

        $consulta = "SELECT * FROM users WHERE id={$id}";
        $stmt = $this->db->query($consulta);
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $resultados;

    }

    /**
     * USER READ
     * @return void
     */
    public function read()
    {

        $consulta = "SELECT * FROM users";
        $stmt = $this->db->query($consulta);
        $resultados = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $resultadoTabela = tabelaResultados($resultados);
        echo $resultadoTabela;

    }

    //no lugar da função, colocar um método aqui para exibir a tabela

}


