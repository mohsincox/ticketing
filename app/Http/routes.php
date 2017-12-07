<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/home-bu', 'HomeController@indexBu');

Route::get('/user', 'UserController@index');

Route::get('ticket-type', 'TicketTypeController@index');

Route::get('ticket-status', 'TicketStatusController@index');

Route::get('ticket', 'TicketController@index');
Route::get('ticket/{id}/edit', 'TicketController@edit');
Route::put('ticket/{id}', 'TicketController@update');

Route::get('crm-ticket/create', 'CrmAndTicketController@create');
Route::post('crm-ticket/crm-store', 'CrmAndTicketController@storeCrm');
Route::post('crm-ticket/ticket-store', 'CrmAndTicketController@storeTicket');
Route::post('crm-ticket/ticket-update', 'CrmAndTicketController@updateTicket');
Route::get('crm-ticket/category-product-show', 'CrmAndTicketController@categoryProductShow');

Route::get('category', 'CategoryController@index');
Route::get('category/create', 'CategoryController@create');
Route::post('category', 'CategoryController@store');
Route::get('category/{id}/edit', 'CategoryController@edit');
Route::put('category/{id}', 'CategoryController@update');

Route::get('sku-product', 'SkuProductController@index');
Route::get('sku-product/create', 'SkuProductController@create');
Route::post('sku-product', 'SkuProductController@store');
Route::get('sku-product/{id}/edit', 'SkuProductController@edit');
Route::put('sku-product/{id}', 'SkuProductController@update');

Route::get('/crm', 'CrmController@index');
Route::get('/crm/download-report-form', 'CrmController@downloadReportForm');
Route::get('/crm/download-report', 'CrmController@downloadReport');

Route::group([ 'middleware' => 'can:ticket_admin-access'], function () {
	Route::get('/user/{id}/edit', 'UserController@edit');
	Route::put('/user/{id}', 'UserController@update');

	Route::get('ticket-type/create', 'TicketTypeController@create');
	Route::post('ticket-type', 'TicketTypeController@store');
	Route::get('ticket-type/{id}/edit', 'TicketTypeController@edit');
	Route::put('ticket-type/{id}', 'TicketTypeController@update');

	Route::get('ticket-status/create', 'TicketStatusController@create');
	Route::post('ticket-status', 'TicketStatusController@store');
	Route::get('ticket-status/{id}/edit', 'TicketStatusController@edit');
	Route::put('ticket-status/{id}', 'TicketStatusController@update');

	Route::get('ticket/create', 'TicketController@create');
	Route::post('ticket', 'TicketController@store');
});

Route::get('/mail','MailTestController@index'); //Working

