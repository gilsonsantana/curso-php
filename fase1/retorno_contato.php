

<?php
/**
 * Created by PhpStorm.
 * User: Gilson
 * Date: 18/01/2016
 * Time: 22:42
 */

require_once ("header.php");

//Verifica se há informações para os parametros postados pelo formulário de contato
//Caso positivo formata e exibe a informação ao usuário.
$feedback = "";
if (isset($_GET["nome"])){
    $nome = $_GET["nome"];
    $feedback = "<b>Nome: </b>" . $nome;
}
if (isset($_GET["email"])){
    $email = $_GET["email"];
    $feedback = $feedback . "<br><b>Email: </b>" . $email;
}
if (isset($_GET["assunto"])){
    $assunto = $_GET["assunto"];
    $feedback = $feedback . "<br><b>Assunto: </b>" . $assunto;
}
if (isset($_GET["mensagem"])){
    $mensagem = $_GET["mensagem"];
    $feedback = $feedback . "<br><b>Mensagem: </b>" . $mensagem;
}
if ($feedback != ""){ ?>
    <div class="alert alert-success">
        Sua mensagem foi recebida com sucesso! Abaixo seguem os dados recebidos: <br>
        <?php echo $feedback ?>
    </div>


<?php }

require_once ("footer.php");

?>