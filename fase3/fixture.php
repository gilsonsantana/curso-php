<?php
/**
 * Created by PhpStorm.
 * User: Gilson
 * Date: 23/01/2016
 * Time: 21:18
 */
require("conectdb.php");
$conn = conectdb();

echo "##### EXECUÇÃO DA FIXTURE INICIADA #####\n";
echo " EXCLUINDO TABELA content";
$conn->exec("DROP TABLE IF EXISTS content");
echo " - OK \n";

echo " RECRIANDO TABELA content";
$conn->exec("CREATE TABLE `content` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `route` varchar(45) DEFAULT NULL,
              `title` varchar(45) DEFAULT NULL,
              `text` varchar(1000) DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
echo " - OK \n";

echo " INSERINDO CONTEÚDO DE TESTE NA TABELA content";
$conn->exec("INSERT INTO content(route, title, text) VALUES (
                'home',
                'Homepage',
                '<p>Esta é a nossa home page. Aqui você começa a ter contato com nosso site e poderá navegar para conhecer um pouco mais da empresa</p>');");
$conn->exec("INSERT INTO content(route, title, text) VALUES (
                'empresa',
                'A Empresa',
                '<p>No direito empresarial, atividade empresarial, ou empresa, é uma atividade econômica exercida profissionalmente pelo empresário por meio da articulação dos fatores produtivos para a produção ou circulação de bens ou de serviços. O conceito jurídico de empresa não pode ser entendido como um sujeito de direito, uma pessoa jurídica, tampouco o local onde se desenvolve a atividade econômica.</p>');");
$conn->exec("INSERT INTO content(route, title, text) VALUES (
                'produtos',
                'Nossos Produtos',
                '<p>Utilizamos técnicas avançadas, como a tecnologia dos genes recombinantes, para desenvolver os mais recentes testes de diagnóstico, precisos, confiáveis e fáceis de utilizar. Atualmente, oferecemos testes de auto-anticorpos para mais de 20 indicações clínicas no sistema EliA totalmente automatizado.</p>');");
$conn->exec("INSERT INTO content(route, title, text) VALUES (
                'servicos',
                'Nossos Serviços',
                '<p>Os Cartões Bradesco oferecem diversos serviços para facilitar o seu dia a dia como serviços pela internet, vantagens de parcelamento, prêmios e segurança nas suas transações.</p>');");
$conn->exec("INSERT INTO content(route, title, text) VALUES (
                'contatos',
                'Entre em contato',
                '<form action=\"retorno_contato.php\" method=\"get\">
                    <fieldset>
                        <label>Nome</label>
                        <input type=\"text\" name=\"nome\" placeholder=\"Informe seu nome…\">
                        <label>Email</label>
                        <input type=\"text\" name=\"email\" placeholder=\"Informe o e-mail…\">
                        <label>Assunto</label>
                        <input type=\"text\" name=\"assunto\" placeholder=\"Qual o assunto?…\">
                        <label>Mensagem</label>
                        <textarea rows=\"3\" name=\"mensagem\" placeholder=\"Abra o seu coração...\"></textarea><br>
                        <button type=\"submit\" class=\"btn\">Enviar</button>
                    </fieldset>
                </form>');");
$conn->exec("INSERT INTO content(route, title, text) VALUES (
                '404',
                'Página não encontrada!',
                '<h2>Ooops! =(</h2><h3>Parece que a pagina que você requisitou não foi encontrada.... </h3>');");

echo " - OK \n";

echo "##### EXECUÇÃO DA FIXTURE CONCLUÍDA #####\n";
