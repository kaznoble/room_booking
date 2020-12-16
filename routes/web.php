<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
  Route::get('/', 'ClientController@index')->name('home');
  Route::get('/clients', 'ClientController@index')->name('clients');
  Route::get('/clients/new', 'ClientController@newClient')->name('new_client');
  Route::post('/clients/new', 'ClientController@newClient')->name('create_client');
  Route::get('/clients/{client_id}', 'ClientController@show')->name('show_client');
  Route::post('/clients/{client_id}', 'ClientController@modify')->name('update_client');
  Route::delete('/clients/{client_id}', 'ClientController@delete')->name('delete_client');

  Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');
  Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms');

  Route::delete('/reservations/{res_id}', 'ReservationsController@cancelReservation')->name('cancel_reservation');

  Route::get('/rooms', 'RoomsController@index')->name('rooms');
  Route::get('/newroom', 'RoomsController@newRoom')->name('new_room');
  Route::post('/newroom', 'RoomsController@newRoom')->name('create_room');
  Route::get('/room/{room_id}', 'RoomsController@modifyRoom')->name('modify_room');
  Route::post('/room/{room_id}', 'RoomsController@modifyRoom')->name('modify_room');
  Route::delete('/room/{room_id}', 'RoomsController@deleteRoom')->name('delete_room');

  Route::get('/comment/{id}', 'CommentsController@edit')->name('edit_comment');
  Route::post('/comment/{id}', 'CommentsController@update')->name('modify_comment');
  Route::post('/comment/room/{room_id}', 'CommentsController@store')->name('store_comment');

  Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom')->name('book_room');
});
