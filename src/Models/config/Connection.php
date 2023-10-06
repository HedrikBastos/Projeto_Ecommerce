<?php

namespace App\Models\Config;
require_once('Data.php');

class Connection
{
    private static $pdo;

    public function execute()
    {
        try {
            if (self::$pdo == null) {
                self::$pdo = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
        } catch (\PDOException $e) {
            echo "<h2>Erro ao conectar</h2>" . $e->getMessage();
        }

        return self::$pdo;
    }
}
