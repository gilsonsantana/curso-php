<?php
/**
 * Created by PhpStorm.
 * User: Gilson
 * Date: 23/01/2016
 * Time: 23:12
 */

require_once ("header.php");
require("conectdb.php");

$termo = $_GET["termo"];
?>

<div class="page-header">
    <h1>
        RESULTADOS PARA A(S) PALAVRA(S) CHAVE PESQUISADA(S)
    </h1>
</div>

<?php

if ($termo <> ""){
    //Conecta ao banco de dados.
    $conn = conectdb();

    //Busca pelo termo de pesquisa nos títulos e texto das páginas cadastradas.
    $sql = "Select route, title from content where (title LIKE :termo OR text LIKE :termo);";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':termo',"%".$termo."%");

    if ($stmt->execute()) {
        $resultados = $stmt->fetchAll();

        echo "<ul>";

        foreach ($resultados as $resultado){
            echo "<li>"."<a href='/".$resultado['route']."' target='_self'>".$resultado['title']."</a></li>";
        }

        echo "</ul>";
    }
} else { ?>

    <div class="alert alert-error">
        Entre com uma ou mais palavras chave para efetuar a busca no site!
    </div>

<?php
}

require_once ("footer.php");