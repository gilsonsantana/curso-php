<?php
/**
 * Created by PhpStorm.
 * User: Gilson
 * Date: 18/01/2016
 * Time: 21:46
 */

require_once ("header.php");

//Obtem os parametros enviado via http
//No primeiro acesso ao site o parametro não é informado, neste caso direciona automaticamente para a homepage.
if (isset($_GET["content"])){
    $content = $_GET["content"];
}else{
    $content = "home";
}

//Tratamento do parametro recebido, caso seja uma pagina valida carrega o conteúdo. Caso contrário direciona para a homepage.
switch($content){
    case "home":
        $pagina = "home";
        break;
    case "empresa":
        $pagina = "empresa";
        break;
    case "produtos":
        $pagina = "produtos";
        break;
    case "servicos":
        $pagina = "servicos";
        break;
    case "contatos":
        $pagina = "contatos";
        break;
    default:
        $pagina = "home";
}
?>

<div class="page-header">
    <h1>
        <?php echo strtoupper($pagina); ?>
    </h1>
</div>

<?php require_once($pagina .".php");

require_once ("footer.php");