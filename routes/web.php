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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');


//for checklists get, if ID = 0 then all
$router->get('/key', 'ExampleController@generateKey');


//for checklists get, if ID = 0 then all
//$router->get('/checklists', 'ChecklistsController@getChecklist');

//for checklists get, if ID = 0 then all
$router->get('/checklists/{id}', 'ChecklistsController@getDetailChecklist');

//for checklists update, if ID = 0 then all
$router->put('/checklists', 'ChecklistsController@putChecklist');


//for checklists add, if ID = 0 then all
$router->post('/checklists', 'ChecklistsController@postChecklist');


//for checklists delete, if ID = 0 then all
$router->delete('/checklists', 'ChecklistsController@deleteChecklist');



//for checklists template
//for checklists get, if ID = 0 then all
//$router->get('/checklists/template', 'TemplateController@getTemplate');

//for checklists items
//for checklists item get, if ID = 0 then all
//$router->get('/checklists/item', 'ItemsController@getItem');

//for checklists histories
//for checklists get, if ID = 0 then all
//$router->get('/checklists/histories', 'HistoryController@getHistory');
