<?php
/**
 * Created by PhpStorm.
 * User: Gilson
 * Date: 23/01/2016
 * Time: 21:17
 */

function conectdb(){
    try {
        $conn_data = require("config.php");

        if(!isset($conn_data["db"])) {
            throw new RuntimeException("Dados de configuração de conexão não encontrados!");
        }

        $host = (isset($conn_data["db"]["host"])) ? $conn_data["db"]["host"] : null;
        $dbname = (isset($conn_data["db"]["dbname"])) ? $conn_data["db"]["dbname"] : null;
        $user = (isset($conn_data["db"]["user"])) ? $conn_data["db"]["user"] : null;
        $password = (isset($conn_data["db"]["password"])) ? $conn_data["db"]["password"] : null;

        return new \PDO("mysql:host={$host};dbname={$dbname}",$user, $password);

    }catch (\PDOException $e) {
        echo $e->getMessage()."\n";
        echo $e->getTraceAsString()."\n";

        return false;
    }
}