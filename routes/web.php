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

$router->get("/products", "ApiController@index");
$router->get("/products/{id}", "ApiController@show");
$router->post("/products/create", "ApiController@store");
$router->post("/products/update/{id}", "ApiController@update");
$router->delete("/products/delete/{id}", "ApiController@destroy");

$router->get('/', function () use ($router) {
    return $router->app->version();
});
