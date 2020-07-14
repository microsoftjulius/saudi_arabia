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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/create-candidates','candidatesController@validateCandidates');
Route::get('/get-candidates','candidatesController@getCandidates');
Route::patch('/change-candidates/{id}','candidatesController@changeCandidates');
Route::delete('/remove-candidates/{id}','candidatesController@removeCandidates');

Route::post('/create-parents','ParentsController@validateParents');
Route::get('/get-parents','ParentsController@getParents');
Route::patch('/change-parents/{id}','ParentsController@changeParents');
Route::delete('/remove-parents/{id}','ParentsController@removeParents');

Route::post('/create-medicalHistory','MedicalHistoryController@validateMedicalHistory');
Route::get('/get-medicalHistory','MedicalHistoryController@getMedicalHistory');
Route::patch('/change-medicalHistory/{id}','MedicalHistoryController@changeMedicalHistory');
Route::delete('/remove-medicalHistory/{id}','MedicalHistoryController@deleteMedicalHistory');

Route::post('/create-abroadCompany','AbroadCompanyController@validateAbroadCompany');
Route::get('/get-abroadCompany','AbroadCompanyController@getAbroadCompany');
Route::patch('/change-abroadCompany/{id}','AbroadCompanyController@changeAbroadCompany');
Route::delete('/remove-abroadCompany/{id}','AbroadCompanyController@removeAbroadCompany');

Route::post('/create-employers','EmployersController@validateEmployers');
Route::get('/get-employers','EmployersController@getEmployers');
Route::patch('/change-employers/{id}','EmployersController@changeEmployers');
Route::delete('/remove-employers/{id}','EmployersController@removeEmployers');

Route::post('/create-ugandanCompany','UgandanCompanyController@validateUgandanCompany');
Route::get('/get-ugandanCompany','UgandanCompanyController@getUgandanCompany');
Route::patch('/change-ugandanCompany/{id}','UgandanCompanyController@changeUgandanCompany');
Route::delete('/remove-ugandanCompany/{id}','UgandanCompanyController@removeUgandanCompany');

Route::post('/create-complaints','ComplaintsController@validatecomplaints');
Route::get('/get-complaints','ComplaintsController@getcomplaints');
Route::patch('/change-complaints/{id}','ComplaintsController@changecomplaints');
Route::delete('/remove-complaints/{id}','ComplaintsController@removecomplaints');

Route::post('/create-solutions','SolutionsController@validateSolutions');
Route::get('/get-solutions','SolutionsController@getSolutions');
Route::patch('/change-solutions/{id}','SolutionsController@changeSolutions');
Route::delete('/remove-solutions/{id}','SolutionsController@removeSolutions');

Route::post('/create-communicationCentres','CommunicationCentresController@validateCommunicationCentres');
Route::get('/get-communicationCentres','CommunicationCentresController@getCommunicationCentres');
Route::patch('/change-communicationCentres/{id}','CommunicationCentresController@changeCommunicationCentres');
Route::delete('/remove-communicationCentres/{id}','CommunicationCentresController@removeCommunicationCentres');

Route::post('/create-permissions','PermissionsController@createPermissions');
Route::get('/get-permissions','PermissionsController@getPermissions');
Route::patch('/change-permissions/{id}','PermissionsController@changePermissions');
Route::delete('/remove-permissions/{id}','PermissionsController@removePermissions');

Route::post('/create-roles','RolesController@validateRoles');
Route::get('/get-roles','RolesController@getRoles');
Route::patch('/change-roles/{id}','RolesController@changeRoles');
Route::delete('/remove-roles/{id}','RolesController@removeRoles');

