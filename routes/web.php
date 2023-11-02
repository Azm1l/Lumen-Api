<?php

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

$app->get('/', function () use ($app) {
    return $app->version();
});

//jwt auth
$app->routeMiddleware([
    'jwt.auth' => App\Http\Middleware\JwtMiddleware::class,
]);

$app->group(['prefix' => 'consignee', 'middleware' => 'jwt.auth'], function () use ($app) {
    $app->get('/', 'ConsigneeController@allData');
    $app->get('/{id}', 'ConsigneeController@singleData');
    $app->post('/', 'ConsigneeController@addData');
    $app->put('/{id}', 'ConsigneeController@putData');
});

$app->group(['prefix' => 'auth'], function () use ($app) {
    $app->post('/login', 'AuthController@login');
    $app->post('/register', 'AuthController@register');
});

$app->group(['prefix' => 'transaction'], function () use ($app) {
    $app->get('/', 'TransactionController@allData');
    $app->get('/{id}', 'TransactionController@singleData');
    $app->post('/', 'TransactionController@addData');
    $app->put('/{id}', 'TransactionController@putData');
});

$app->group(['prefix' => 'masterlocation'], function () use ($app) {
    $app->get('/', 'MasterLocationController@allData');
    $app->get('/{id}', 'MasterLocationController@singleData');
    $app->post('/', 'MasterLocationController@addData');
});


$app->group(['prefix' => 'checkin'], function () use ($app) {;
    $app->get('/{id}', 'CheckInController@singleData');
    $app->post('/', 'CheckInController@addData');
});


$app->post('/updatebulk', 'UpdateBulkController@addData');
$app->get('/masterstatus', 'MasterStatusController@index');

$app->get('/todo', 'TodoController@index');
