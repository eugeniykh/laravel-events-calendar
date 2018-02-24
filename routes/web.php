<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Main events view

Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']);

// Show event model new view

Route::get('/add', ['uses' => 'EventController@add', 'as' => 'add']);

// Show event model view

Route::get('/event/{event}', ['uses' => 'EventController@show', 'as' => 'event.edit']);

// Route for create new event model

Route::post('/event', ['uses' => 'EventController@store', 'as' => 'event.store']);

// Route for update event model

Route::put('/event/{event}', ['uses' => 'EventController@update', 'as' => 'event.update']);

// Route for delete event model

Route::delete('/event/{event}', ['uses' => 'EventController@destroy', 'as' => 'event.destroy']);

// Get all events in json

Route::get('/events', ['uses' => 'EventController@events', 'as' => 'events']);
