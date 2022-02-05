<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tickets', 'TicketController@index');
Route::group(['prefix' => 'ticket'], function () {
    Route::post('add', 'TicketController@add');
    Route::get('detail/{id}', 'TicketController@detail');
    Route::post('update/{id}', 'TicketController@update');
    Route::delete('delete/{id}', 'TicketController@delete');
});

Route::get('receipts', 'OfficialReceiptController@index');
Route::group(['prefix' => 'receipt'], function () {
    Route::post('add', 'OfficialReceiptController@add');
    Route::get('edit/{id}', 'OfficialReceiptController@edit');
    Route::post('update/{id}', 'OfficialReceiptController@update');
    Route::delete('delete/{id}', 'OfficialReceiptController@delete');
});
