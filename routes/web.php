<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get(
    '/example',
    [
        'as' => 'example',
        'uses' => 'ExampleController@getExample'
    ]
);

//CRUD Usuarios
$router->get('/usuarios', ['uses' => 'UsuariosController@index']);
$router->get('/usuarios/{id}', ['uses' => 'UsuariosController@show']);
$router->post('/usuarios', ['uses' => 'UsuariosController@store']);
$router->put('/usuarios/{id}', ['uses' => 'UsuariosController@update']);
$router->delete('/usuarios/{id}', ['uses' => 'UsuariosController@destroy']);

//CRUD Restaurantes
$router->get('/restaurantes', ['uses' => 'RestaurantesController@index']);
$router->get('/restaurantes/{id}', ['uses' => 'RestaurantesController@show']);
$router->post('/restaurantes', ['uses' => 'RestaurantesController@store']);
$router->put('/restaurantes/{id}', ['uses' => 'RestaurantesController@update']);
$router->delete('/restaurantes/{id}', ['uses' => 'RestaurantesController@delete']);

//CRUD Platos
$router->get('/platos', ['uses' => 'PlatosController@index']);
$router->get('/platos/{id}', ['uses' => 'PlatosController@show']);
$router->post('/platos', ['uses' => 'PlatosController@store']);
$router->put('/platos/{id}', ['uses' => 'PlatosController@update']);
$router->delete('/platos/{id}', ['uses' => 'PlatosController@destroy']);

//CRUD Pedidos
$router->get('/pedidos', ['uses' => 'PedidosController@index']);
$router->get('/pedidos/{id}', ['uses' => 'PedidosController@show']);
$router->post('/pedidos', ['uses' => 'PedidosController@store']);
$router->put('/pedidos/{id}', ['uses' => 'PedidosController@update']);
$router->delete('/pedidos/{id}', ['uses' => 'PedidosController@delete']);
