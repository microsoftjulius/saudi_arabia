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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () { return view('welcome');})->name('Dashboard');
    Route::get('/general-map','MapsController@getGeneralMap')->name('General Map');
    Route::get('/get-recruites/{id}','candidatesController@getCandidates')->name('Workers');
    Route::get('/create-embassy','EmbassyController@validatedEmbassy')->name('Embassies');
    Route::get('/get-embassy-users','EmbassyController@getAllEmbassies')->name('Embassies');
    Route::get('/get-ministry-users','MinistriesController@getAllMinistries')->name('Ministries');
    Route::post('/create-ministry','MinistriesController@validateMinistry')->name('Ministries');
    Route::post('/create-candidates','ParentsController@validateCandidates');
    Route::patch('/change-candidates/{id}','candidatesController@changeCandidates');
    Route::delete('/remove-candidates/{id}','candidatesController@removeCandidates');
    Route::get('/candidates-current-location/{id}','MapsController@getCandidatesCurrentLocation');
    Route::post('/create-parents','ParentsController@createParents');
    Route::get('/get-parents','ParentsController@getParents');
    Route::patch('/change-parents/{id}','ParentsController@changeParents');
    Route::delete('/remove-parents/{id}','ParentsController@removeParents');
    Route::get('/view-candidates-info/{id}','candidatesController@getCandidatesInfo')->name('Candidates Information');
    Route::post('/create-medicalHistory','MedicalHistoryController@createMedicalHistory');
    Route::get('/get-medicalHistory','MedicalHistoryController@getMedicalHistory');
    Route::patch('/change-medicalHistory/{id}','MedicalHistoryController@changeMedicalHistory');
    Route::delete('/remove-medicalHistory/{id}','MedicalHistoryController@deleteMedicalHistory');
    Route::get('/view-complaint/{id}','ComplaintsController@viewComplaint')->name("Complaint Descrition");
    Route::post('/create-abroadCompany','AbroadCompanyController@validateAbroadCompany');
    Route::get('/get-recruiting-companies','AbroadCompanyController@getAbroadCompany')->name("Recruiting Companies");
    Route::get('/activate-company/{id}','AbroadCompanyController@updateAbroadCompany');
    Route::get('/remove-abroadCompany/{id}','AbroadCompanyController@removeAbroadCompany');
    Route::get('/get-all-solved-complaints','ComplaintsController@getAllSolvedComplaints')->name('Solved Complaints');
    Route::post('/create-employers','EmployersController@validateEmployers');
    Route::get('/get-employers','EmployersController@getEmployers')->name("Employers");
    Route::patch('/change-employers/{id}','EmployersController@changeEmployers');
    Route::delete('/remove-employers/{id}','EmployersController@removeEmployers');
    Route::get('/create-new-contract','ContractController@createNewContract')->name("Domestic Workers with no Employers");
    Route::post('/create-ugandanCompany','UgandanCompanyController@createUgandanCompany');
    Route::get('/get-ugandanCompany','UgandanCompanyController@getUgandanCompany');
    Route::patch('/change-ugandanCompany/{id}','UgandanCompanyController@changeUgandanCompany');
    Route::delete('/remove-ugandanCompany/{id}','UgandanCompanyController@removeUgandanCompany');
    Route::get('/assign-employer-to-employee/{id}','ContractController@assignEmployerToEmployee')->name("Assign Employer To");
    Route::post('/create-complaints','ComplaintsController@validateComplaints');
    Route::get('/get-complaint-form','ComplaintsController@getComplaintForm')->name('Make a Complaint');
    Route::get('/get-all-complaints','ComplaintsController@getComplaints')->name('Complaints');
    Route::patch('/change-complaints/{id}','ComplaintsController@changecomplaints');
    Route::delete('/remove-complaints/{id}','ComplaintsController@removecomplaints');
    Route::post('/create-contract-between-employer-and-employee','ContractController@validateContract');
    Route::get('/get-active-licenses','CompaniesController@getActiveLicenses')->name('Active Licenses');
    Route::get('/get-expired-licenses','CompaniesController@getExpiredLicenses')->name('Expired Licenses');
    Route::get('/get-terminated-licenses','CompaniesController@getTerminatedLicenses')->name('Terminated Licenses');

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

    Route::get('/get-expired-contract','ContractController@getExpiredContracts')->name('Contracts');
    Route::get('/get-ongoing-contracts','ContractController@getOnGoingContracts')->name('Ongoing Contracts');
    Route::get('/get-terminated-contracts','ContractController@getTerminatedContracts')->name('Terminated Contracts');
    Route::post('/create-roles','RolesController@createRoles');
    Route::get('/get-roles','RolesController@getRoles');
    Route::patch('/change-roles/{id}','RolesController@changeRoles');
    Route::delete('/remove-roles/{id}','RolesController@removeRoles');

    Route::post('/report-a-sickness','MedicalStatusController@validateReport');

    Route::post('/create-insuarance-policy','InsurancePolicyController@validateInsurancePolicy');
    Route::post('/register-candidates-current-location','CandidatesCurrentLocation@registerGirlsCurrentLocation');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

