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
    Route::get('/', 'HomeController@index')->name('Dashboard');
    Route::get('/general-map','MapsController@getGeneralMap')->name('General Map');
    Route::get('/get-recruites/{id}','candidatesController@getCandidates')->name('Workers');
    Route::get('/create-embassy','EmbassyController@validatedEmbassy')->name('Embassies');
    Route::get('/get-embassy-users','EmbassyController@getAllEmbassies')->name('Embassies');
    Route::get('/get-ministry-users','MinistriesController@getAllMinistries')->name('Ministries');
    Route::post('/create-ministry','MinistriesController@validateMinistry')->name('Ministries');
    Route::post('/create-candidates','ParentsController@validateCandidates');
    Route::patch('/change-candidates/{id}','candidatesController@changeCandidates');
    Route::get('/remove-candidate/{id}','candidatesController@removeCandidates');
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
    Route::get('/activate-company/{id}','AbroadCompanyController@activateCompany');
    Route::get('/remove-abroadCompany/{id}','AbroadCompanyController@removeAbroadCompany');
    Route::get('/get-all-solved-complaints','ComplaintsController@getAllSolvedComplaints')->name('Solved Complaints');
    Route::post('/create-employers','EmployersController@validateEmployers');
    Route::get('/get-employers','EmployersController@getEmployers')->name("Employers");
    Route::patch('/change-employers/{id}','EmployersController@changeEmployers');
    Route::get('/remove-employers/{id}','EmployersController@removeEmployers');
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
    Route::get('/mark-complaint-as-solved/{id}','ComplaintsController@markComplaintAsSolved');
    Route::post('/create-solutions','SolutionsController@createSolutions');
    Route::get('/get-solutions','SolutionsController@getSolutions');
    Route::patch('/change-solutions/{id}','SolutionsController@changeSolutions');
    Route::delete('/remove-solutions/{id}','SolutionsController@removeSolutions');
    Route::get('/mark-complaint-as-not-solved/{id}','ComplaintsController@markComplaintAsNotSolved');
    Route::post('/create-communicationCentres','CommunicationCentresController@createCommunicationCentres');
    Route::get('/get-communicationCentres','CommunicationCentresController@getCommunicationCentres');
    Route::patch('/change-communicationCentres/{id}','CommunicationCentresController@changeCommunicationCentres');
    Route::delete('/remove-communicationCentres/{id}','CommunicationCentresController@removeCommunicationCentres');
    Route::get('/mark-contract-as-terminated/{id}','ContractController@terminateContract');
    Route::post('/create-permissions','PermissionsController@createPermissions');
    Route::get('/get-permissions','PermissionsController@getPermissions');
    Route::patch('/change-permissions/{id}','PermissionsController@changePermissions');
    Route::delete('/remove-permissions/{id}','PermissionsController@removePermissions');
    Route::get('/activate-terminated-contract/{id}','ContractController@activateContract');
    Route::get('/get-expired-contract','ContractController@getExpiredContracts')->name('Contracts');
    Route::get('/get-ongoing-contracts','ContractController@getOnGoingContracts')->name('Ongoing Contracts');
    Route::get('/get-terminated-contracts','ContractController@getTerminatedContracts')->name('Terminated Contracts');
    Route::post('/create-roles','RolesController@createRoles');
    Route::get('/get-roles','RolesController@getRoles');
    Route::patch('/change-roles/{id}','RolesController@changeRoles');
    Route::delete('/remove-roles/{id}','RolesController@removeRoles');
    Route::get('/mark-finished-contract-as-active/{id}','ContractController@finishContract');
    Route::post('/report-a-sickness','MedicalStatusController@validateReport');
    Route::get('/view-info-about-employer/{id}','EmployersController@viewAllAboutEmployer');
    Route::get('/get-all-complaints-for-deployment-team','ComplaintsController@getComplaintsForDeployment')->name("Complaints");
    Route::get('/get-all-pending-complaints-for-deployment-team','ComplaintsController@getPendingComplaintsForDeployment')->name("Pending Complaints");
    Route::get('/get-all-solved-complaints-for-deployment-team','ComplaintsController@getSolvedComplaintsForDeployment')->name("Solved Complaints");
    Route::post('/create-insuarance-policy','InsurancePolicyController@validateInsurancePolicy');
    Route::post('/register-candidates-current-location','CandidatesCurrentLocation@registerGirlsCurrentLocation');
    Route::get('/get-company-domestic-workers','candidatesController@getCompanyCandidates')->name("Company domestic workers");
    Route::get('/get-company-deleted-domestic-workers','candidatesController@getDeletedCompanyCandidates')->name("Deleted domestic workers");
    Route::get('/view-complaint/{complaint_id}','ComplaintsController@viewComplaint')->name("Complaints");
    Route::get('/get-all-companies','CompaniesController@getAllCompanies')->name("All Companies");
});
Route::get('details', function () {

	$ip = '41.210.143.243';
    $data = \Location::get($ip);
    dd($data);
    return $data->zipCode;
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-my-complaints','ComplaintsController@getMyComplaints');

