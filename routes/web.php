<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function () {
    Route::resource('funcionario', 'FuncionarioController');
    Route::resource('vacina', 'VacinaController');
});

Route::fallback(function () {
    return view('errors.404');
})->name('erro');
