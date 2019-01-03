<?php 
//adiciona os arquivos necessarios
require_once("vendor/autoload.php");
//cria uma nova aplicação do SLIM
$app = new \Slim\Slim();
//configura o modo debug para explicar cada erro
$app->config('debug', true);
//criando rota inicial
$app->get('/', function() {
    
	$sql = new Hcode\DB\Sql();

	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);

});
//manda executar a aplicação
$app->run();

 ?>