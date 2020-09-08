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

Auth::routes();

Route::get('/', 'HomeController@index')->name('painel-principal');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create-post','PostConstroller@create' )->name('post.create');
Route::get('/my-posts','PostConstroller@showmyposts' )->name('post.show');
Route::get('/validate','PostConstroller@validacao' )->name('post.validacao');
Route::post('/store-post','PostConstroller@store')->name('post.store');
Route::post('/rate-post','PostConstroller@rate')->name('post.rate');
Route::post('/updated','PostConstroller@alterarDados')->name('post.dados');
Route::get('post/edit/{posts}','PostConstroller@editar')->name('post.editar');
Route::get('perfil','PostConstroller@meuperfil')->name('post.perfil');
Route::put ('post/editsave/{post}','PostConstroller@editsave')->name('post.editsave');
Route::get('/team/{posts}','PostConstroller@team' )->name('post.team');
Route::get('post/team-validate/{post}','PostConstroller@team_validate')->name('team.validate');
Route::get('post/projetos','PostConstroller@showprojetos')->name('projetos.show');
Route::get('convites','PostConstroller@convites')->name('convites');
Route::get('convites/enviar/{post}','PostConstroller@enviarConvite')->name('convite.enviar');
Route::get('convites/aceitar/{convites}','PostConstroller@aceitarConvite')->name('convites.aceitar');
Route::get('convites/excluir/{convites}','PostConstroller@exluirConvite')->name('convites.excluir');
Route::get('recomendacoes','PostConstroller@showRecomendacoes')->name('show.recomendacoes');
Route::post('envioderecomendacao','PostConstroller@envRecomendacao')->name('post.recomendacao');
