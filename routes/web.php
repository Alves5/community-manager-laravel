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
Use Illuminate\Support\Facades\Input;
Use App\Edital;
use App\Agenda;

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

//Rotas para a página de editais
Route::get('/ShowEdital', 'EditalController@index')->name('show');
Route::get('/DetailEdital/{id}', 'EditalController@detailEdital');
Route::post('/ShowEdital', function(){
    $q = Input::get('search');
    if($q != ' '){
        $edital = Edital::where('titulo', 'LIKE' ,'%'.$q.'%')->get();
        if(count($edital) >= 1 ){
            return view('edital.index', compact('edital'));
        }
    }
    return view('edital.index');
});
Route::post('/Create', 'EditalController@inserir')->name('createEdital');
Route::post('/Update/{id}', 'EditalController@update')->name('updateEdital');
Route::get('/RemoveEdital/{id}', 'EditalController@remove');

//Rota para teste de envio de email
Route::get('/Email', 'EmailController@home');
Route::post('/SendEmail', 'EmailController@enviarEmail')->name('enviarEmail');

//Rotas para a página agenda
Route::get('/Agenda', 'AgendaController@index')->name('agendaShow');
Route::get('/AdicionarEvento', 'AgendaController@insert');
Route::post('/AtualizarEvento/{id}', 'AgendaController@update')->name('AtualizarEvento');
Route::get('/RemoverEvento/{id}', 'AgendaController@remove');
Route::post('/Agenda', function(){
    $a = Input::get('search_agenda');
    if($a != ' '){
        $agenda = Agenda::where('evento', 'LIKE' ,'%'.$a.'%')->get();
        if(count($agenda) >= 1 ){
            return view('agenda.index', compact('agenda'));
        }
        
    }
    return view('agenda.index');
});
