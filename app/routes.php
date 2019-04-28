<?php

$logado = null;

if(isset($_SESSION['logado'])){
    $logado = $_SESSION['logado'];
}

//Admin 
$app->post('/login/logar','App\Controllers\LoginController:logar');
$app->get('/login/logout', 'App\Controllers\LoginController:logout');
$app->get('/', 'App\Controllers\LoginController:login');
$app->get('/login', 'App\Controllers\LoginController:login');

if(isset($logado) && !is_null($logado) && $logado > 0){
    
$app->get('/dashboard/index','App\Controllers\DashboardController:index');
$app->get('/dashboard','App\Controllers\DashboardController:index');

$app->get('/empresa','App\Controllers\EmpresaController:index');
$app->get('/empresa/index','App\Controllers\EmpresaController:index');
$app->get('/empresa/cadastro','App\Controllers\EmpresaController:cadastro');
$app->post('/empresa/cadastrar','App\Controllers\EmpresaController:cadastrar');
$app->get('/empresa/edicao','App\Controllers\EmpresaController:edicao');
$app->post('/empresa/editar','App\Controllers\EmpresaController:editar');

$app->get('/usuario/resetarsenha', 'App\Controllers\UsuarioController:resetarSenha');
$app->post('/usuario/atualizarsenha', 'App\Controllers\UsuarioController:atualizarSenha');

$app->get('/unidade', 'App\Controllers\UnidadeController:index');
$app->get('/unidade/index','App\Controllers\UnidadeController:index');
$app->get('/unidade/cadastro','App\Controllers\UnidadeController:cadastro');
$app->post('/unidade/cadastrar','App\Controllers\UnidadeController:cadastrar');
$app->get('/unidade/edicao','App\Controllers\UnidadeController:edicao');
$app->post('/unidade/editar','App\Controllers\UnidadeController:editar');
$app->get('/unidade/excluir','App\Controllers\UnidadeController:excluir');

$app->get('/feriado', 'App\Controllers\FeriadoController:index');
$app->get('/feriado/index', 'App\Controllers\FeriadoController:index');
$app->get('/feriado/cadastro', 'App\Controllers\FeriadoController:cadastro');
$app->POST('/feriado/cadastrar', 'App\Controllers\FeriadoController:cadastrar');
$app->get('/feriado/edicao', 'App\Controllers\FeriadoController:edicao');
$app->post('/feriado/editar', 'App\Controllers\FeriadoController:editar');
$app->get('/feriado/excluir','App\Controllers\FeriadoController:excluir');

$app->get('/pdn', 'App\Controllers\PDNController:index');
$app->get('/pdn/index', 'App\Controllers\PDNController:index');

$app->get('/funcao', 'App\Controllers\FuncaoController:index');
$app->get('/funcao/index','App\Controllers\FuncaoController:index');
$app->get('/funcao/cadastro','App\Controllers\FuncaoController:cadastro');
$app->post('/funcao/cadastrar','App\Controllers\FuncaoController:cadastrar');
$app->get('/funcao/edicao','App\Controllers\FuncaoController:edicao');
$app->post('/funcao/editar','App\Controllers\FuncaoController:editar');
$app->get('/funcao/excluir','App\Controllers\FuncaoController:excluir');

$app->get('/funcionario', 'App\Controllers\FuncionarioController:index');
$app->get('/funcionario/index','App\Controllers\FuncionarioController:index');
$app->get('/funcionario/cadastro','App\Controllers\FuncionarioController:cadastro');
$app->post('/funcionario/cadastrar','App\Controllers\FuncionarioController:cadastrar');
$app->get('/funcionario/detalhes','App\Controllers\FuncionarioController:detalhes');
$app->get('/funcionario/importacao','App\Controllers\FuncionarioController:importacao');
$app->get('/funcionario/exclusao','App\Controllers\FuncionarioController:exclusao');

$app->get('/lotacao/cadastro','App\Controllers\LotacaoController:cadastro');
$app->post('/lotacao/cadastrar','App\Controllers\LotacaoController:cadastrar');

$app->get('/jornadadetrabalho/cadastro','App\Controllers\JornadaDeTrabalhoController:cadastro');

$app->post('/lotacaojornadadetrabalho/cadastrar','App\Controllers\LotacaoJornadaDeTrabalhoController:cadastrar');

$app->get('/ponto','App\Controllers\PontoController:index');
$app->get('/ponto/index','App\Controllers\PontoController:index');
$app->get('/ponto/exportacao','App\Controllers\PontoController:exportacao');
$app->get('/ponto/importacao','App\Controllers\PontoController:importacao');
$app->get('/ponto/exportar','App\Controllers\PontoController:exportar');
$app->get('/ponto/importar','App\Controllers\PontoController:importar');

$app->get('/calendario','App\Controllers\CalendarioController:index');
$app->get('/calendario/index','App\Controllers\CalendarioController:index');
}else{
    Header('Location', '/login');
}


//Site
//$app->get('/', 'App\Controllers\HomeController:index');
//$app->get('/home', 'App\Controllers\HomeController:index');
//$app->get('/contato', 'App\Controllers\HomeController:contato');
//$app->get('/sobre', 'App\Controllers\HomeController:sobre');

