<?php 
//iniciando a sessão
session_start();
//adiciona os arquivos necessarios
require_once("vendor/autoload.php");
//cria uma nova aplicação do SLIM
use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

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
    
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");

});

//criando rota login
$app->get('/admin/login', function() {
    // essa pagina nao tem header nem footer, entao precisa
    //desabilitar essas opcoes
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");

});

$app->get('/admin/logout', function() {
    
	User::logout();

	header("Location: /admin/login");
	exit;

});

$app->post('/admin/login', function(){

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;

});

//manda executar a aplicação
$app->run();

 ?>