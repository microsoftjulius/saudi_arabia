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

Route::post('/create-complaints/{id}','ComplaintsController@complainApi');
Route::post('/check-credentials','UserController@loginUser');
Route::get('/get-my-complaints/{id}','ComplaintsController@getMyComplaints');
Route::get('/get-my-number-of-pending-complaints/{id}','ComplaintsController@getMyNumberOfPendingComplaints');
Route::get('/get-my-number-of-solved-complaints/{id}','ComplaintsController@getMyNumberOfApprovedComplaints');
Route::get('/get-my-number-of-complaints/{id}','ComplaintsController@getMyNumberOfComplaints');
Route::get('/get-my-pending-complaints/{id}','ComplaintsController@getMyPendingComplaints');
Route::get('/get-my-solved-complaints/{id}','ComplaintsController@getMySolvedComplaints');
Route::get('/get-my-statistics/{id}','ComplaintsController@getMyStatistics');