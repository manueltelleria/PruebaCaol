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

use App\CaoUsuario;

Route::get('/', function () {
    //return view('welcome');
    return view('partials.entrada');

});

Route::get('/vista', function () {

    return view('consultor.desempeno');
});

Route::get('listado_consultores/{page?}', 'Consultor\ListadoController@listado_consultores');

Route::get('consultor', 'Consultor\ListadoController@entrada');

Route::get('ganancia', 'Consultor\ListadoController@getDesempeno');

Route::get('relatorio', 'Consultor\ListadoController@relatorio');

Route::get('pizza', 'Consultor\GraphsController@pizza');

Route::get('grafico', 'Consultor\GraphsController@grafico');

