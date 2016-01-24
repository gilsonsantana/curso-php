<?php
/**
 * Created by PhpStorm.
 * User: Gilson
 * Date: 18/01/2016
 * Time: 21:46
 */

require("conectdb.php");

//Array com as rotas válidas para a aplicação
//NOTA: a rota "" é também uma rota válida e equivale ao HOME do site.
$rotas = [  ""=> "home",
            "home"=>"home",
            "empresa"=>"empresa",
            "produtos"=>"produtos",
            "servicos"=>"servicos",
            "contatos"=>"contatos"];


//Função que verifica se a rota solicitada está entre as rotas válidas e se o arquivo existe.
//1º check: verifica se a URL está dentro do range de rotas válidas,
//2º check: verifica se o arquivo existe,
//caso um dos 2 checks aponte falha retorna a url "404", caso contrário retorna a url validada.
function checkURL($url) {
    global $rotas;
    if(array_key_exists($url, $rotas)){
        return $rotas[$url];

    }else{
        header("HTTP/1.0 404 Not Found");
        return "404";
    }
}

require_once ("header.php");

//Decodifica a URL de Entrada.
$url = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$decode_path = explode("/",$url["path"]);

//Valida se o user entrou com uma URI válida.
//REGRAS:
//A URI deve ter apenas um nível (exemplo: /home/user é inválido).
//A pagina deve estar compreendida na relação de redirects da aplicação.
//O arquivo com o conteúdo da pagina deve existir.
if (count($decode_path)>2){
    $route = "404";
}else{
    $route = checkURL($decode_path[1]);
}

//Conecta ao banco de dados.
$conn = conectdb();

//Busca o conteúdo a ser carregado na página.
$sql = "Select title, text from content where route = :route";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':route',$route);

if ($stmt->execute()){
    $content = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Conteúdo não encontrado!";
}

?>

<div class="page-header">
    <h1>
        <?php echo strtoupper($content["title"]); ?>
    </h1>

    <?php echo $content["text"]; ?>

</div>

<?php

require_once ("footer.php");