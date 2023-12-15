<?php

namespace Database;
require_once __DIR__ . "/../Boot/Config.php";

class Connect
{
    //Variável que guarda a conexão PDO.
    protected static $db;

    //Private construct - garante que a classe só possa ser instanciada internamente.
    private function __construct()
    {
        //Informações sobre o banco de dados:
        $db_host = CONF_DB_HOST;
        $db_nome = CONF_DB_NAME;
        $db_usuario = CONF_DB_USER;
        $db_senha = CONF_DB_PASS;
        $db_driver = "mysql";

        try //conectar
        {
            //Atribui o objeto PDO à variável $db.
            self::$db = new \PDO("$db_driver:host=$db_host; dbname=$db_nome", $db_usuario, $db_senha);
            //Garante que o PDO lance exceções durante erros.
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //Garante que os dados sejam armazenados com codificação UFT-8.
            self::$db->exec('SET NAMES utf8');
        }
        catch (\PDOException $e)
        {
            echo "<h1>Erro de conexão com o Banco de Dados. Aguarde e tente novamente mais tarde :)</h1>";
        }
    }

    //Método estático - acessível sem instanciação.
    public static function conexao()
    {
        //Garante uma única instância. Se não existe uma conexão, criamos uma nova.
        if (!self::$db)
        {
            new Connect();
        }

        //Retorna a conexão.
        return self::$db;
    }

}