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
$router->group(["prefix" => "products"], function () use ($router) {
    $router->get("/", "ApiController@index");
    $router->get("/{id}", "ApiController@show");
    $router->post("/create", "ApiController@store");
    $router->post("/update/{id}", "ApiController@update");
    $router->delete("/delete/{id}", "ApiController@destroy");
});
$router->get('/', function () {
    return view("index");
});
