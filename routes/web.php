<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rota básica para definir as funções do CRUD
Route::resource('biodata', 'BiodataController');

//Rota para para definir as funções do CRUD
Route::resource('startup', 'StartupController');

//Rota para a página de recuperar senha
Route::get('/Recuperar', function(){
    return view('recuperar.trocarSenha');
});

//Rotas para alterar as configurações dos mentores e membros
Route::resource('dadosMentoresMembros', 'DadosMentoresMembrosController');

//Rota para a página de alterar senha
Route::get('/Alterar', function(){
    return view('alterarSenha.alterar');
});

