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

$router->get('/key', function () use ($router) {
   return str_random(32);
});

///   Departments Section
$router->get('/showListDepartment', 'Departments\DepartmentsController@getDepartmentList');
$router->get('/showListDepartment/{id:[0-9]+}', 'Departments\DepartmentsController@getDepartmentById');
$router->post('/department/create', 'Departments\DepartmentsController@newDepartment');
$router->post('/department/update', 'Departments\DepartmentsController@updateDepartment');
$router->delete('/department/delete/{id:[0-9]+}', 'Departments\DepartmentsController@deleteDepartment');
$router->post('/department/search', 'Departments\DepartmentsController@advanceSearch');

/// Topics Section
$router->get('/showListTopic', 'Topics\TopicsController@getTopicsList');
$router->post('/topic/create', 'Topics\TopicsController@newTopic');
$router->post('/topic/update', 'Topics\TopicsController@updateTopic');
$router->delete('/topic/delete/{id:[0-9]+}', 'Topics\TopicsController@deleteTopic');
$router->get('/showListTopic/{id:[0-9]+}', 'Topics\TopicsController@getTopicsById');
// $router->get('/showListTopic', function () use ($router) {
//     return str_random(32);
// });deleteTopic