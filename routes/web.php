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

//for checklists get, if ID = 0 then all
$router->get('/key', 'ExampleController@generateKey');

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');
$router->get('/user/{id}', 'UserController@show');

//for checklists template
//for checklists get, if ID = 0 then all
$router->get('/checklists/templates', 'TemplateController@getAllTemplate');
//for checklists get, if ID = 0 then all
$router->post('/checklists/templates', 'TemplateController@postTemplate');
//for checklists get, if ID = 0 then all
$router->get('/checklists/templates/{id}', 'TemplateController@getDetailTemplate');
//for checklists get, if ID = 0 then all
$router->patch('/checklists/templates/{id}', 'TemplateController@patchTemplate');
//for checklists get, if ID = 0 then all
$router->delete('/checklists/templates/{id}', 'TemplateController@deleteTemplate');
//for checklists get, if ID = 0 then all
$router->post('/checklists/templates/{id}/assigns', 'TemplateController@postAssignsTemplate');


//for checklists
//for checklists get, if ID = 0 then all
$router->get('/checklists/{checklistId}', 'ChecklistsController@getDetailChecklist');
//for checklists update, if ID = 0 then all
$router->patch('/checklists/{checklistId}', 'ChecklistsController@patchChecklist');
//for checklists insert, if ID = 0 then all
$router->post('/checklists', 'ChecklistsController@postChecklist');
//for checklists delete, if ID = 0 then all
$router->delete('/checklists/{checklistId}', 'ChecklistsController@deleteChecklist');
//for checklists insert, if ID = 0 then all
$router->get('/checklists', 'ChecklistsController@getALLChecklist');


//for Items
//for items all, if ID = 0 then all
$router->post('/checklists/complete', 'ItemsController@postCompleteItem');
//for items all, if ID = 0 then all
$router->post('/checklists/incomplete', 'ItemsController@postInCompleteItem');
//for checklists get, if ID = 0 then all
$router->get('/checklists/{checklistId}/items', 'ItemsController@getListItem');
//for checklists get, if ID = 0 then all
$router->post('/checklists/{checklistId}/items', 'ItemsController@postItem');
//for checklists get, if ID = 0 then all
$router->get('/checklists/{checklistId}/items/{itemId}', 'ItemsController@getDetailItem');
//for checklists get, if ID = 0 then all
$router->patch('/checklists/{checklistId}/items/{itemId}', 'ItemsController@patchItem');
//for checklists get, if ID = 0 then all
$router->delete('/checklists/{checklistId}/items/{itemId}', 'ItemsController@deleteItem');
//for checklists get, if ID = 0 then all
$router->post('/checklists/{checklistId}/items/_bulk', 'ItemsController@postBulkItem');
//for checklists get, if ID = 0 then all
$router->get('/checklists/items/summary', 'ItemsController@getAllItem');


//for checklists get, if ID = 0 then all
$router->get('/checklists/histories', 'HistoryController@getHistories');
//for checklists get, if ID = 0 then all
$router->get('/checklists/histories/{historyId}', 'HistoryController@getDetailHistories');

