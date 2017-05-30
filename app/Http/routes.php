<?php
Route::get('/', 'ProdutoController@lista');


Route::get('/produtos', 'ProdutoController@lista');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove');

Route::get('/produtos/busca/{id}', 'ProdutoController@busca');

Route::post('/produtos/alterado/{id}', 'ProdutoController@alterado');

Route::get('/login', 'LoginController@login');

Route::get('/logout', 'LoginController@logout');



