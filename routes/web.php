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

Route::middleware(['auth'])->group(function () {
	Route::get('/', 'DashboardController@index');

	// Qualification Questions
	Route::get('/perguntas-e-respostas/', 'QualificationQuestionController@index');
	Route::get('/perguntas-e-respostas/novo', 'QualificationQuestionController@new');
	Route::post('/perguntas-e-respostas/novo', 'QualificationQuestionController@store');
	Route::delete('/perguntas-e-respostas/{id}', 'QualificationQuestionController@destroy');

	// Services
	Route::get('/servicos/', 'ServicesController@index');
	Route::get('/servicos/novo', 'ServicesController@new');
	Route::post('/servicos/novo', 'ServicesController@store');
	Route::delete('/servicos/{id}', 'ServicesController@destroy');

	// Orders
	Route::get('/pedidos/', 'OrderController@index');
	Route::get('/pedidos/novo/{leadId}', 'OrderController@create');
	Route::post('/pedidos/novo', 'OrderController@store');
	Route::get('/pedidos/{id}', 'OrderController@show');
	Route::put('/pedidos/fechar/{id}', 'OrderController@closeOrder');

	// Leads
	Route::get('/potenciais-clientes/', 'LeadController@index');
	Route::get('/potenciais-clientes/novo', 'LeadController@create');
	Route::post('/potenciais-clientes/novo', 'LeadController@store');
	Route::get('/potenciais-clientes/{id}', 'LeadController@show');
	Route::get('/potenciais-clientes/atualizar-status/{id}', 'LeadController@updateStatus');

});

Auth::routes();

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

