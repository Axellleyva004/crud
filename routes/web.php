<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});
Route::get('casillas/pdf','CasillasController@generatepdf');
Route::get('candidatos/pdf','CandidatosController@generatepdf');
Route::get('eleccioncomites/pdf','EleccioncomitesController@generatepdf');
Route::get('elecciones/pdf','EleccionesController@generatepdf');
Route::get('funcionarios/pdf','FuncionariosController@generatepdf');
Route::get('roles/pdf','RolesController@generatepdf');
Route::get('funcionariocasillas/pdf','FuncionariocasillasController@generatepdf');
Route::get('imeiautorizados/pdf','ImeiautorizadosController@generatepdf');
Route::get('votos/pdf','VotosController@generatepdf');
Route::get('votocandidatos/pdf','VotocandidatosController@generatepdf');
Route::resource('candidatos', 'CandidatosController')->middleware('auth');
Route::resource('casillas', 'CasillasController')->middleware('auth');
Route::resource('elecciones', 'EleccionesController')->middleware('auth');
Route::resource('funcionarios', 'FuncionariosController')->middleware('auth');
Route::resource('roles', 'RolesController')->middleware('auth');
Route::resource('eleccioncomites', 'EleccioncomitesController')->middleware('auth');
Route::resource('funcionariocasillas', 'FuncionariocasillasController')->middleware('auth');
Route::resource('imeiautorizados', 'ImeiautorizadosController')->middleware('auth');
Route::resource('votos','VotosController')->middleware('auth');
Route::resource('votocandidatos','VotocandidatosController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

