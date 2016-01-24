<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aula PHP - Projeto Fase 3</title>
</head>
<body>
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['HTTP_HOST'] ?> /bootstrap/css/bootstrap.css">
    <script src="<?php $_SERVER['HTTP_HOST'] ?> /bootstrap/js/bootstrap.js"></script>

    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav">
                <li><a href=<?php $_SERVER['HTTP_HOST'] ?>"/home">Home</a></li>
                <li><a href=<?php $_SERVER['HTTP_HOST'] ?>"/empresa">Empresa</a></li>
                <li><a href=<?php $_SERVER['HTTP_HOST'] ?>"/produtos">Produtos</a></li>
                <li><a href=<?php $_SERVER['HTTP_HOST'] ?>"/servicos">Serviços</a></li>
                <li><a href=<?php $_SERVER['HTTP_HOST'] ?>"/contatos">Contatos</a></li>
            </ul>
            <form class="navbar-search pull-right" action="retorno_busca.php">
                <input type="text" name="termo" class="search-query" placeholder="Buscar no site...">
            </form>
        </div>

    </div>

