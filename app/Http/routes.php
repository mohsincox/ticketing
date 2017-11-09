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

Route::get('/user', 'UserController@index');

Route::get('ticket-type', 'TicketTypeController@index');

Route::get('ticket-status', 'TicketStatusController@index');

Route::get('crm-ticket/create', 'CrmAndTicketController@create');
Route::post('crm-ticket/crm-store', 'CrmAndTicketController@storeCrm');
Route::post('crm-ticket/ticket-store', 'CrmAndTicketController@storeTicket');

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
});

