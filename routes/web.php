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
$router->get('/showListTopic/{id:[0-9]+}', 'Topics\TopicsController@getTopicsById');
$router->post('/topic/create', 'Topics\TopicsController@newTopic');
$router->post('/topic/update', 'Topics\TopicsController@updateTopic');
$router->delete('/topic/delete/{id:[0-9]+}', 'Topics\TopicsController@deleteTopic');
$router->get('/showListTopic/{id:[0-9]+}', 'Topics\TopicsController@getTopicsById');
// $router->get('/showListTopic', function () use ($router) {
//     return str_random(32);
// });deleteTopic


// Collection
$router->get('/showListCollection', 'Collection\CollectionController@getCollectionsList');
$router->post('/collection/create', 'Collection\CollectionController@newCollection');
$router->post('/collection/update', 'Collection\CollectionController@updateCollection');
$router->delete('/collection/delete/{id:[0-9]+}', 'Collection\CollectionController@deleteCollection');

// GMSCountry
$router->get('/showListCountry', 'GMSCountry\GMSCountryController@getCountryList');
$router->post('/country/create', 'GMSCountry\GMSCountryController@newCountry');
$router->post('/country/update', 'GMSCountry\GMSCountryController@updateCountry');
$router->delete('/country/delete/{id:[0-9]+}', 'GMSCountry\GMSCountryController@deleteCountry');

// Help Categories
$router->get('/showListHelpCategories', 'HelpCategories\HelpCategoriesController@getHelpCategoriesList');
$router->get('/showListHelpCategories/{id:[0-9]+}', 'HelpCategories\HelpCategoriesController@getHelpCategoriesById');
$router->post('/helpCategories/create', 'HelpCategories\HelpCategoriesController@newHelpCategories');
$router->post('/helpCategories/update', 'HelpCategories\HelpCategoriesController@updateHelpCategories');
$router->delete('/helpCategories/delete/{id:[0-9]+}', 'HelpCategories\HelpCategoriesController@deleteHelpCategories');

// Help Content
$router->get('/showListHelpContent', 'HelpContent\HelpContentController@getHelpContentList');
$router->get('/showListHelpContent/{id:[0-9]+}', 'HelpContent\HelpContentController@getHelpContentById');
$router->post('/helpContent/create', 'HelpContent\HelpContentController@newHelpContent');
$router->post('/helpContent/update', 'HelpContent\HelpContentController@updateHelpContent');
$router->delete('/helpContent/delete/{id:[0-9]+}', 'HelpContent\HelpContentController@deleteHelpContent');

// Books
$router->post('/books/create', 'Books\BooksController@newBooks');
$router->post('/books/update', 'Books\BooksController@updateBooks');
$router->delete('/books/delete/{id:[0-9]+}', 'Books\BooksController@deleteBooks');