<?php 
//adiciona os arquivos necessarios
require_once("vendor/autoload.php");
//cria uma nova aplicação do SLIM
use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new Slim();
//configura o modo debug para explicar cada erro
$app->config('debug', true);
//criando rota inicial
$app->get('/', function() {
    
	$page = new Page();

	$page->setTpl("index");

});
//criando rota administração
$app->get('/admin', function() {
    
	$page = new PageAdmin();

	$page->setTpl("index");

});
//manda executar a aplicação
$app->run();

 ?>