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

Route::get('/', 'InfoController@bienvenido');

Route::get('/nosotros', 'InfoController@nosotros');

Route::get('/cursos', 'InfoController@cursos');

Route::get('/noticiasyeventos', 'InfoController@notieven');
Route::get('/noticiasyeventos/{notieven}', 'InfoController@notievenshow')->name('notievenshow');

Route::get('/multimedia', 'InfoController@multimedia');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::put('/admin/images/edit','AdminController@update')->name('images.update');

Route::get('/admin/cursos', 'CursoController@index')->name('cursos.index');
Route::get('/admin/cursos/create', 'CursoController@create')->name('cursos.create');
Route::post('/admin/cursos/create','CursoController@store')->name('cursos.store');
Route::get('/admin/cursos/{curso}','CursoController@detail')->name('cursos.detail');
Route::get('/admin/cursos/edit/{curso}','CursoController@edit')->name('cursos.edit');
Route::put('/admin/cursos/edit/{curso}','CursoController@update')->name('cursos.update');
Route::delete('/admin/cursos/delete/{curso}','CursoController@delete')->name('cursos.delete');

Route::get('/admin/noticias', 'NoticiaController@index')->name('noticias.index');
Route::get('/admin/noticias/create', 'NoticiaController@create')->name('noticias.create');
Route::post('/admin/noticias/create','NoticiaController@store')->name('noticias.store');
Route::get('/admin/noticias/{notieven}','NoticiaController@detail')->name('noticias.detail');
Route::get('/admin/noticias/edit/{notieven}','NoticiaController@edit')->name('noticias.edit');
Route::put('/admin/noticias/edit/{notieven}','NoticiaController@update')->name('noticias.update');
Route::delete('/admin/noticias/delete/{notieven}','NoticiaController@delete')->name('noticias.delete');

Route::get('/admin/eventos', 'EventoController@index')->name('eventos.index');
Route::get('/admin/eventos/create', 'EventoController@create')->name('eventos.create');
Route::post('/admin/eventos/create','EventoController@store')->name('eventos.store');
Route::get('/admin/eventos/{notieven}','EventoController@detail')->name('eventos.detail');
Route::get('/admin/eventos/edit/{notieven}','EventoController@edit')->name('eventos.edit');
Route::put('/admin/eventos/edit/{notieven}','EventoController@update')->name('eventos.update');
Route::delete('/admin/eventos/delete/{notieven}','EventoController@delete')->name('eventos.delete');

Route::get('/admin/tipos', 'TipoController@index')->name('tipos.index');
Route::get('/admin/tipos/create', 'TipoController@create')->name('tipos.create');
Route::post('/admin/tipos/create','TipoController@store')->name('tipos.store');
// Route::get('/admin/tipos/{tipo}','TipoController@detail')->name('tipos.detail');
Route::get('/admin/tipos/edit/{tipo}','TipoController@edit')->name('tipos.edit');
Route::put('/admin/tipos/edit/{tipo}','TipoController@update')->name('tipos.update');
// Route::delete('/admin/tipos/delete/{tipo}','TipoController@delete')->name('tipos.delete');

Route::get('/admin/teatros', 'TeatroController@index')->name('teatros.index');
Route::get('/admin/teatros/create', 'TeatroController@create')->name('teatros.create');
Route::post('/admin/teatros/create','TeatroController@store')->name('teatros.store');
Route::get('/admin/teatros/{teatro}','TeatroController@detail')->name('teatros.detail');
Route::get('/admin/teatros/edit/{teatro}','TeatroController@edit')->name('teatros.edit');
Route::put('/admin/teatros/edit/{teatro}','TeatroController@update')->name('teatros.update');
Route::delete('/admin/teatros/delete/{teatro}','TeatroController@delete')->name('teatros.delete');

Route::get('/admin/docentes', 'DocenteController@index')->name('docentes.index');
Route::get('/admin/docentes/create', 'DocenteController@create')->name('docentes.create');
Route::post('/admin/docentes/create','DocenteController@store')->name('docentes.store');
Route::get('/admin/docentes/{docente}','DocenteController@detail')->name('docentes.detail');
Route::get('/admin/docentes/edit/{docente}','DocenteController@edit')->name('docentes.edit');
Route::put('/admin/docentes/edit/{docente}','DocenteController@update')->name('docentes.update');
Route::delete('/admin/docentes/delete/{docente}','DocenteController@delete')->name('docentes.delete');

Route::get('/admin/periodos', 'PeriodoController@index')->name('periodos.index');
Route::get('/admin/periodos/create', 'PeriodoController@create')->name('periodos.create');
Route::post('/admin/periodos/create','PeriodoController@store')->name('periodos.store');
Route::get('/admin/periodos/{periodo}','PeriodoController@detail')->name('periodos.detail');
Route::get('/admin/periodos/edit/{periodo}','PeriodoController@edit')->name('periodos.edit');
Route::put('/admin/periodos/edit/{periodo}','PeriodoController@update')->name('periodos.update');
Route::delete('/admin/periodos/delete/{periodo}','PeriodoController@delete')->name('periodos.delete');

Route::get('/admin/users', 'UserController@index')->name('users.index');
// Route::get('/admin/users/create', 'UserController@create')->name('users.create');
// Route::post('/admin/users/create','UserController@store')->name('users.store');
Route::get('/admin/users/{user}','UserController@detail')->name('users.detail');
// Route::get('/admin/users/edit/{user}','UserController@edit')->name('users.edit');
// Route::put('/admin/users/edit/{user}','UserController@update')->name('users.update');
Route::delete('/admin/users/delete/{user}','UserController@delete')->name('users.delete');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Authentication Routes..
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

