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

$router->get('/', 'HelloWorldController@index');

//TABEL FILM
$router->group(['prefix' => 'film'], function() use ($router){
    $router->get('/','Master\FilmController@index');
    $router->get('/{id}','Master\FilmController@view');
    //POST
    $router->post('/','Master\FilmController@create');
    //PUT
    $router->put('/{id}','Master\FilmController@update');
    //DELETE
    $router->delete('/{id}','Master\FilmController@delete');
});


//TABEL ACTOR
$router->group(['prefix'=>'actor'], function() use ($router){
    $router->get('/','Master\ActorController@index');
    $router->get('/{id}','Master\ActorController@view');
    //POST
    $router->post('/','Master\ActorController@create');
    //PUT
    $router->put('/{id}','Master\ActorController@update');
    //DELETE
    $router->delete('/{id}','Master\ActorController@delete');
});

//TABEL CATEGORY
$router->group(['prefix'=>'category'], function() use ($router){
    $router->get('/','Master\CategoryController@index');
    $router->get('/{id}','Master\CategoryController@view');
    //POST
    $router->post('/','Master\CategoryController@create');
    //PUT
    $router->put('/{id}','Master\CategoryController@update');
    //DELETE
    $router->delete('/{id}','Master\CategoryController@delete');
});

//TABEL LANGUAGE
$router->group(['prefix'=>'language'], function() use ($router){
    $router->get('/','Master\LanguageController@index');
    $router->get('/{id}','Master\LanguageController@view');
    //POST
    $router->post('/','Master\LanguageController@create');
    //PUT
    $router->put('/{id}','Master\LanguageController@update');
    //DELETE
    $router->delete('/{id}','Master\LanguageController@delete');
});

//TABEL ADDRESS
$router->group(['prefix'=>'address'], function() use ($router){
    $router->get('/','Master\AddressController@index');
    $router->get('/{id}','Master\AddressController@view');
    //POST
    $router->post('/','Master\AddressController@create');
    //PUT
    $router->put('/{id}','Master\AddressController@update');
    //DELETE
    $router->delete('/{id}','Master\AddressController@delete');
});

//TABEL COUNTRY
$router->group(['prefix'=>'country'],function()use($router){
    $router->get('/','Master\CountryController@index');
    $router->get('/{id}','Master\CountryController@view');
    //POST
    $router->post('/','Master\CountryController@create');
    //PUT
    $router->put('/{id}','Master\CountryController@update');
    //DELETE
    $router->delete('/{id}','Master\CountryController@delete');
});


//TABEL STORE
$router->group(['prefix'=>'store'],function()use($router){
    $router->get('/','Master\StoreController@index');
    $router->get('/{id}','Master\StoreController@view');
    //POST
    $router->post('/','Master\StoreController@create');
    //PUT
    $router->put('/{id}','Master\StoreController@update');
    //DELETE
    $router->delete('/{id}','Master\StoreController@delete');
});


//TABEL CITY
$router->group(['prefix'=>'city'],function()use($router){
    $router->get('/','Master\CityController@index');
    $router->get('/{id}','Master\CityController@view');
    //POST
    $router->post('/','Master\CityController@create');
    //PUT
    $router->put('/{id}','Master\CityController@update');
    //DELETE
    $router->delete('/{id}','Master\CityController@delete');
});


//TABEL INVENTORY
$router->group(['prefix'=>'inventory'],function()use($router){
    $router->get('/','Master\InventoryController@index');
    $router->get('/{id}','Master\InventoryController@view');
    //POST
    $router->post('/','Master\InventoryController@create');
    //PUT
    $router->put('/{id}','Master\InventoryController@update');
    //DELETE
    $router->delete('/{id}','Master\InventoryController@delete');
});

//TABEL RENTAL
$router->group(['prefix'=>'rental'],function()use($router){
    $router->get('/rental','Master\RentalController@index');
    $router->get('/rental/{id}','Master\RentalController@view');

    //POST
    $router->post('/rental','Master\RentalController@create');
});

//TABEL STAFF
$router->group(['prefix'=>'staff'],function()use($router){
    $router->get('/','Master\StaffController@index');
    $router->get('/{id}','Master\StaffController@view');
    //POST
    $router->post('/','Master\StaffController@create');
    //PUT
    $router->put('/{id}','Master\StaffController@update');
    //DELETE
    $router->delete('/{id}','Master\StaffController@delete');
});

//TABEL CUSTOMER
$router->group(['prefix'=>'customer'],function()use($router){
    $router->get('/','Master\CustomerController@index');
    $router->get('/{id}','Master\CustomerController@view');
    //POST
    $router->post('/','Master\CustomerController@create');
    //PUT
    $router->put('/{id}','Master\CustomerController@update');
    //DELETE
    $router->delete('/{id}','Master\CustomerController@delete');
});














