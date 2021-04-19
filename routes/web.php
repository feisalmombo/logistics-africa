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

Route::get('/', function () {
    return view('auth.login');
    });

// Authentication routes
Route::get('login', [
	'as' => 'login',
	'uses' => 'Auth\LoginController@showLoginForm'
  ]);
  Route::post('login', [
	'as' => '',
	'uses' => 'Auth\LoginController@login'
  ]);
  Route::post('logout', [
	'as' => 'logout',
	'uses' => 'Auth\LoginController@logout'
  ]);

  // Password reset routes
  Route::post('password/email', [
	'as' => 'password.email',
	'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);

  // Forgot password controller
  Route::get('password/reset', [
	'as' => 'password.request',
	'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  // Reset password controller
  Route::post('password/reset', [
	'as' => 'password.update',
	'uses' => 'Auth\ResetPasswordController@reset'
  ]);

  // Reset password with token
  Route::get('password/reset/{token}', [
	'as' => 'password.reset',
	'uses' => 'Auth\ResetPasswordController@showResetForm'
  ]);

//  New view for user change password
Route::get('/change_password', function () {
    return view('auth.passwords.new_user_change_pwd');
});

// Change Password Controller
Route::post('/change_password', 'ChangePasswordController@updateNewuser');
Route::resource('/change-password', 'ChangePasswordController');
Route::post('/change-password', 'ChangePasswordController@update');

// Check user status Middleware
Route::group(['middleware' => 'CheckUserStatus'], function () {

    // Validate Button History Middleware
    Route::group(['middleware' => 'ValidateButtonHistory'], function () {

        // Auth Middleware
        Route::group(['middleware' => 'auth'], function () {

            // Home Controller
            Route::get('/home', 'HomeController@index')->name('home');

            //  User Controller
            Route::resource('/view-users', 'ViewUsersController');
            Route::post('/view-users', 'ViewUsersController@store');
            Route::get('/reset/{id}', 'ViewUsersController@resetpwd');
            Route::get('/view-users/profile', 'ViewUsersController@show');
            Route::get('/view/all/users', 'ViewUsersController@allSystemsUsers');

            // Project controller
            Route::resource('/projects', 'ProjectsController');
            Route::post('/projects', 'ProjectsController@store'); 

            // Budget Expenditure Controller
            Route::resource('/budget/expenditures', 'BudgetExpendituresController');
            Route::post('/budget/expenditures', 'BudgetExpendituresController@store');  

            // Kind Procurement Controller
            Route::resource('/kind/procurements', 'KindProcurementsController');
            Route::post('/kind/procurements', 'KindProcurementsController@store'); 

            // Insurance Monitoring Controller 
            Route::resource('/insurance/monitorings', 'InsuranceMonitoringsController');
            Route::post('/insurance/monitorings', 'InsuranceMonitoringsController@store'); 

            // Vehicle log sheet controller
            Route::resource('/vehicle/log/sheets', 'VehicleLogSheetsController');
            Route::post('/vehicle/log/sheets', 'VehicleLogSheetsController@store'); 

            // Maintenance monitoring assets controller
            Route::resource('/maintenance/monitoring/assets', 'MaintenanceMonitoringAssetsController');
            Route::post('/maintenance/monitoring/assets', 'MaintenanceMonitoringAssetsController@store');
            
            // Procurement requests controller
            Route::resource('/procurement/requests', 'ProcurementRequestsController');
            Route::post('/procurement/requests', 'ProcurementRequestsController@store');

            // Permissions Controller
            Route::get('/settings/manage_users/permissions/entrust_user', 'PermissionsController@entrust_user');
            Route::get('/settings/manage_users/permissions/entrust', 'PermissionsController@entrust');
            Route::post('/settings/manage_users/permissions/entrust_usr', 'PermissionsController@entrust_user_permissions');
            Route::get('/settings/manage_users/permissions/entrustRole', 'PermissionsController@entrust_roles');
            Route::post('/settings/manage_users/permissions/entrust_role_permissions', 'PermissionsController@entrust_role_permissions');
            Route::get('/settings/manage_users/permissions/entrust_role', 'PermissionsController@entrust_role');
            Route::resource('/settings/manage_users/permissions/', 'PermissionsController');

            // Roles Controller
            Route::get('/settings/manage_users/roles/entrust', 'RolesController@get_roles');
            Route::post('/settings/manage_users/roles/entrust', 'RolesController@post_roles');
            Route::get('/settings/manage_users/roles/add', 'RolesController@add');
            Route::resource('/settings/manage_users/roles', 'RolesController');
        });
    });
});



