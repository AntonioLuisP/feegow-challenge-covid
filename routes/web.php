<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('funcionario', 'FuncionarioController');
Route::get('/funcionarios-nao-vacinados', 'FuncionarioController@naoVacinados')->name('funcionario.naoVacinados');
Route::resource('vacina', 'VacinaController');

Route::group(['prefix' => 'vacinas-aplicadas', 'as' => 'aplicacao.'], function () {
    Route::get('/', 'VacinaAplicadaController@index')->name('index');
    Route::get('/{funcionario}/create', 'VacinaAplicadaController@create')->name('create');
    Route::post('/{funcionario}/store', 'VacinaAplicadaController@store')->name('store');
    Route::get('/{aplicacao}/edit', 'VacinaAplicadaController@edit')->name('edit');
    Route::put('/{aplicacao}/update', 'VacinaAplicadaController@update')->name('update');
    Route::delete('/{aplicacao}/delete', 'VacinaAplicadaController@destroy')->name('destroy');
});

Route::fallback(function () {
    return view('errors.404');
});
