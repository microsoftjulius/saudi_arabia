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

Route::get('/', function () { return view('welcome');})->name('Dashboard');
Route::get('/general-map','MapsController@getGeneralMap')->name('General Map');
Route::get('/get-recruites','UserController@getCandidates')->name('Recruites');
Route::post('/create-candidates','candidatesController@createCandidates');
Route::get('/get-candidates','candidatesController@getCandidates');
Route::patch('/change-candidates/{id}','candidatesController@changeCandidates');
Route::delete('/remove-candidates/{id}','candidatesController@removeCandidates');

Route::post('/create-parents','ParentsController@createParents');
Route::get('/get-parents','ParentsController@getParents');
Route::patch('/change-parents/{id}','ParentsController@changeParents');
Route::delete('/remove-parents/{id}','ParentsController@removeParents');

Route::post('/create-medicalHistory','MedicalHistoryController@createMedicalHistory');
Route::get('/get-medicalHistory','MedicalHistoryController@getMedicalHistory');
Route::patch('/change-medicalHistory/{id}','MedicalHistoryController@changeMedicalHistory');
Route::delete('/remove-medicalHistory/{id}','MedicalHistoryController@deleteMedicalHistory');

Route::post('/create-abroadCompany','AbroadCompanyController@createAbroadCompany');
Route::get('/get-abroadCompany','AbroadCompanyController@getAbroadCompany');
Route::patch('/change-abroadCompany/{id}','AbroadCompanyController@changeAbroadCompany');
Route::delete('/remove-abroadCompany/{id}','AbroadCompanyController@removeAbroadCompany');

Route::post('/create-employers','EmployersController@createEmployers');
Route::get('/get-employers','EmployersController@getEmployers');
Route::patch('/change-employers/{id}','EmployersController@changeEmployers');
Route::delete('/remove-employers/{id}','EmployersController@removeEmployers');

Route::post('/create-ugandanCompany','UgandanCompanyController@createUgandanCompany');
Route::get('/get-ugandanCompany','UgandanCompanyController@getUgandanCompany');
Route::patch('/change-ugandanCompany/{id}','UgandanCompanyController@changeUgandanCompany');
Route::delete('/remove-ugandanCompany/{id}','UgandanCompanyController@removeUgandanCompany');

Route::post('/create-complaints','ComplaintsController@createcomplaints');
Route::get('/get-complaints','ComplaintsController@getcomplaints');
Route::patch('/change-complaints/{id}','ComplaintsController@changecomplaints');
Route::delete('/remove-complaints/{id}','ComplaintsController@removecomplaints');

Route::post('/create-solutions','SolutionsController@createSolutions');
Route::get('/get-solutions','SolutionsController@getSolutions');
Route::patch('/change-solutions/{id}','SolutionsController@changeSolutions');
Route::delete('/remove-solutions/{id}','SolutionsController@removeSolutions');

Route::post('/create-communicationCentres','CommunicationCentresController@createCommunicationCentres');
Route::get('/get-communicationCentres','CommunicationCentresController@getCommunicationCentres');
Route::patch('/change-communicationCentres/{id}','CommunicationCentresController@changeCommunicationCentres');
Route::delete('/remove-communicationCentres/{id}','CommunicationCentresController@removeCommunicationCentres');

Route::post('/create-permissions','PermissionsController@createPermissions');
Route::get('/get-permissions','PermissionsController@getPermissions');
Route::patch('/change-permissions/{id}','PermissionsController@changePermissions');
Route::delete('/remove-permissions/{id}','PermissionsController@removePermissions');

Route::post('/create-roles','RolesController@createRoles');
Route::get('/get-roles','RolesController@getRoles');
Route::patch('/change-roles/{id}','RolesController@changeRoles');
Route::delete('/remove-roles/{id}','RolesController@removeRoles');

Route::post('/report-a-sickness','MedicalStatusController@validateReport');

Route::post('/create-insuarance-policy','InsurancePolicyController@validateInsurancePolicy');
route::post('/register-candidates-current-location','CandidatesCurrentLocation@registerGirlsCurrentLocation');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
