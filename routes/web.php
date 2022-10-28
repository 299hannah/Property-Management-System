<?php

// use App\Http\Controllers\Controller;
// use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminDamagedRoomController;
use App\Http\Controllers\AdminTenantsController;
use App\Http\Controllers\AdminVacantRoomController;
use App\Http\Controllers\AgentVacantRoomController;
use App\Http\Controllers\AgentDamagedRoomController;
use App\Http\Controllers\AgentTenantsController;
use App\Http\Controllers\AgentTransactionsController;
use App\Http\Controllers\AdminTransactionsController;
// use App\Http\Controllers\TenantController;
use App\Http\Controllers\TenantProfileController;
use App\Http\Controllers\TenantsController;

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
Route::get('/','App\Http\Controllers\User\HomeController@index');

Route::get('post/{post}','App\Http\Controllers\PropertyController@post')->name('post');
Route::get('post/category/{category}','App\Http\Controllers\user\HomeController@category')->name('category');



Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group( function (){
    Route::get('/dashboard','AdminController@Dashboard')->name('admin.dashboard')->middleware('admin');

    Route::get('/login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\LoginController@login');
  
    Route::get('/logout','AdminController@AdminLogout')->name('admin.logout');
    Route::get('/register','AdminController@AdminRegister')->name('admin.register');
    Route::post('/register/create','AdminController@AdminRegisterCreate')->name('admin.register.create');

    Route::resource('/agent','AgentController');
    Route::resource('/post','PropertyController');
    Route::resource('/category','LocationController');

});

Route::prefix('agent')->namespace('App\Http\Controllers\Agent')->group( function (){

    Route::get('/dashboard','AgentController@AgentDashboard')->name('agent.dashboard')->middleware('agent');
    Route::get('/login','Auth\LoginController@showLoginForm')->name('agent.login');
    Route::post('/login','Auth\LoginController@login'); 
    
    Route::get('/logout','AgentController@AgentLogout')->name('agent.logout')->middleware('agent');
    Route::get('/register','AgentController@AgentRegister')->name('agent.register');
    Route::post('/register/create','AgentController@AgentRegisterCreate')->name('agent.register.create');
    // Route::get('/profile', 'ProfileController@index')->name('agent.profile');
    // Route::get('/editprofile/{id}', 'ProfController@update');
    Route::get('/profile/profile', 'ProfController@index')->name('profile.index');
    Route::get('/profile/editprofile', 'EditProfileController@update')->name('profile.update');




    Route::get('/rooms', 'RoomsController@index');
    Route::get('/rooms/create', 'RoomsController@create');
    Route::post('/rooms/store', 'RoomsController@store');
    Route::get('/rooms/edit/{room_id}', 'RoomsController@edit');
    Route::post('/rooms/update/{room_id}', 'RoomsController@update');
    Route::post('/rooms/{room_id}', 'RoomsController@destroy');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('web');
Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin/home');

Route::resource('admin/tenants/', AdminTenantsController::class);
Route::get('admin/tenants/create', [AdminTenantsController::class, 'create']);
Route::post('admin/tenants/store', [AdminTenantsController::class, 'store']);
Route::get('admin/tenants/edit/{tenant_id}', [AdminTenantsController::class, 'edit']);
Route::post('admin/tenants/update/{tenant_id}', [AdminTenantsController::class, 'update']);
Route::get('admin/tenants/show/{tenant_id}', [AdminTenantsController::class, 'show']);

Route::get('admin/vacantrooms/', [AdminVacantRoomController::class, 'index']);
Route::get('admin/vacantrooms/create', [AdminVacantRoomController::class, 'create']);
Route::post('admin/vacantrooms/store', [AdminVacantRoomController::class, 'store']);
Route::get('admin/vacantrooms/edit/{vacantroom_id}', [AdminVacantRoomController::class, 'edit']);
Route::post('admin/vacantrooms/update/{vacantroom_id}', [AdminVacantRoomController::class, 'update']);
Route::post('admin/vacantrooms/{vacantroom_id}', [AdminVacantRoomController::class, 'destroy']);

Route::get('admin/damagedrooms/', [AdminDamagedRoomController::class, 'index']);
Route::get('admin/damagedrooms/create', [AdminDamagedRoomController::class, 'create']);
Route::post('admin/damagedrooms/store', [AdminDamagedRoomController::class, 'store']);
Route::get('admin/damagedrooms/edit/{damagedroom_id}', [AdminDamagedRoomController::class, 'edit']);
Route::post('admin/damagedrooms/update/{damagedroom_id}', [AdminDamagedRoomController::class, 'update']);
Route::post('admin/damagedrooms/{damagedroom_id}', [AdminDamagedRoomController::class, 'destroy']);

Route::get('admin/transactions/', [AdminTransactionsController::class, 'index']);

Route::get('agent/tenants/', [AgentTenantsController::class, 'index']);
Route::get('agent/tenants/create', [AgentTenantsController::class, 'create']);
Route::post('agent/tenants/store', [AgentTenantsController::class, 'store']);
Route::get('agent/tenants/edit/{tenant_id}', [AgentTenantsController::class, 'edit']);
Route::post('agent/tenants/update/{tenant_id}', [AgentTenantsController::class, 'update']);
Route::get('agent/tenants/show/{tenant_id}', [AgentTenantsController::class, 'show']);
Route::get('tenants/transactions', [TransactionsController::class, 'index']);
Route::get('tenants/profile', [TenantProfileController::class, 'index'])->name('tenant.profile');

Route::get('agent/vacantrooms', [AgentVacantRoomController::class, 'index']);
Route::get('agent/vacantrooms/create', [AgentVacantRoomController::class, 'create']);
Route::post('agent/vacantrooms/store', [AgentVacantRoomController::class, 'store']);
Route::get('agent/vacantrooms/edit/{vacantroom_id}', [AgentVacantRoomController::class, 'edit']);
Route::post('agent/vacantrooms/update/{vacantroom_id}', [AgentVacantRoomController::class, 'update']);
Route::post('agent/vacantrooms/{vacantroom_id}', [AgentVacantRoomController::class, 'destroy']);

Route::get('agent/damagedrooms/', [AgentDamagedRoomController::class, 'index']);
Route::get('agent/damagedrooms/create', [AgentDamagedRoomController::class, 'create']);
Route::post('agent/damagedrooms/store', [AgentDamagedRoomController::class, 'store']);
Route::get('agent/damagedrooms/edit/{damagedroom_id}', [AgentDamagedRoomController::class, 'edit']);
Route::post('agent/damagedrooms/update/{damagedroom_id}', [AgentDamagedRoomController::class, 'update']);
Route::post('agent/damagedrooms/{damagedroom_id}', [AgentDamagedRoomController::class, 'destroy']);

Route::get('agent/transactions/', [AgentTransactionsController::class, 'index']);
Route::get('agent/transactions/create', [AgentTransactionsController::class, 'create']);
Route::post('agent/transactions/store', [AgentTransactionsController::class, 'store']);
Route::get('agent/transactions/edit/{transaction_id}', [AgentTransactionsController::class, 'edit']);
Route::post('agent/transactions/update/{transaction_id}', [AgentTransactionsController::class, 'update']);
Route::post('agent/transactions/{transaction_id}', [AgentTransactionsController::class, 'destroy']);

// Route::get('tenants/', [TenantController::class, 'index']);

Route::get('tenant/index', [TenantsController::class, 'index']);
// Route::get('transactions/', [TenantsController::class, 'create']);
Route::post('transactions/store', [TenantsController::class, 'store']);





