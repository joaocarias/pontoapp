<?php

//Admin 
$app->post('/login/logar','App\Controllers\LoginController:logar');
$app->get('/dashboard/index','App\Controllers\DashboardController:index');
$app->get('/dashboard','App\Controllers\DashboardController:index');
$app->get('/login/logout', 'App\Controllers\LoginController:logout');
$app->get('/empresa','App\Controllers\EmpresaController:index');
$app->get('/empresa/index','App\Controllers\EmpresaController:index');
$app->get('/empresa/cadastro','App\Controllers\EmpresaController:cadastro');
$app->post('/empresa/cadastrar','App\Controllers\EmpresaController:cadastrar');
$app->get('/empresa/edicao','App\Controllers\EmpresaController:edicao');
$app->post('/empresa/editar','App\Controllers\EmpresaController:editar');
$app->get('/usuario/resetarsenha', 'App\Controllers\UsuarioController:resetarSenha');
$app->post('/usuario/atualizarsenha', 'App\Controllers\UsuarioController:atualizarSenha');

//Site
$app->get('/', 'App\Controllers\HomeController:index');
$app->get('/home', 'App\Controllers\HomeController:index');
$app->get('/contato', 'App\Controllers\HomeController:contato');
$app->get('/sobre', 'App\Controllers\HomeController:sobre');
$app->get('/login', 'App\Controllers\LoginController:login');
