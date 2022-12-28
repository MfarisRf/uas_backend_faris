<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Halo63Controller;
use App\Http\Controllers\User63Controller;
use App\Http\Controllers\Admin63Controller;
use App\Http\Controllers\Agama63Controller;
use App\Http\Controllers\Login63Controller;
use App\Http\Controllers\Register63Controller;
use App\Http\Controllers\apiclient\User63Controller as ClientUser63Controller;
use App\Http\Controllers\apiclient\Agama63Controller as ClientAgama63Controller;

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

//welcome page
Route::get('/', function () {
    return redirect('/login63');
});

Route::group(['middleware' => ['isNotLogin']], function () {
    // Register Login
    Route::view('/register63', 'register');
    Route::view('/login63', 'login');
    Route::post('/register63', [App\Http\Controllers\Register63Controller::class, 'register63']);
    Route::post('/login63', [App\Http\Controllers\Login63Controller::class, 'login63']);
});

// Role Admin
Route::group(['middleware' => ['isAdmin']], function () {

    // API DATA USER
    Route::get('/dashboard63', [User63Controller::class, 'dashboardPage63']);
    Route::get('/user63/{id}', [User63Controller::class, 'detailPage63']);
    Route::get('/user63/{id}/status', [User63Controller::class, 'putUserStatus63']);
    Route::post('/user63/{id}/agama', [User63Controller::class, 'putUserAgama63']);
    Route::get('/user63/{id}/delete', [Admin63Controller::class, 'deleteUser63']);

    // API AGAMA
    Route::get("/agama63", [Agama63Controller::class, "agamaPage63"]);
    Route::post("/agama63", [Agama63Controller::class, "createAgama63"]);
    Route::get("/agama63/{id}/edit", [Agama63Controller::class, "editAgamaPage63"]);
    Route::post("/agama63/{id}/update", [Agama63Controller::class, "updateAgama63"]);
    Route::get("/agama63/{id}/delete", [Agama63Controller::class, "deleteAgama63"]);

    // API CLIENT DATA USER
    Route::get("/apiclient/dashboard63", [ClientUser63Controller::class, "dashboardPage63"]);
    Route::get("/apiclient/user63/{id}", [ClientUser63Controller::class, "detailPage63"]);
    Route::get("/apiclient/user63/{id}/status", [ClientUser63Controller::class, "putUserStatus63"]);
    Route::post("/apiclient/user63/{id}/agama", [ClientUser63Controller::class, "putUserAgama63"]);
    Route::get("/apiclient/user63/{id}/delete", [ClientUser63Controller::class, "deleteUser63"]);

    // API CLIENT AGAMA
    Route::get("/apiclient/agama63", [ClientAgama63Controller::class, "agamaPage63"]);
    Route::get("/apiclient/agama63/{id}/edit", [ClientAgama63Controller::class, "editAgamaPage63"]);
    Route::post("/apiclient/agama63", [ClientAgama63Controller::class, "createAgama63"]);
    Route::post("/apiclient/agama63/{id}/update", [ClientAgama63Controller::class, "updateAgama63"]);
    Route::get("/apiclient/agama63/{id}/delete", [ClientAgama63Controller::class, "deleteAgama63"]);
});


// Role User
Route::group(['middleware' => ['isUser']], function () {

    // API User
    Route::view('/changePassword63', 'editPW');
    Route::get('/profile63', [User63Controller::class, 'profilePage63']);
    Route::post('/user63', [User63Controller::class, 'putUserDetail63']);
    Route::post('/user63/photo', [User63Controller::class, 'putUserPhoto63']);
    Route::post('/user63/photoKTP', [User63Controller::class, 'putUserPhotoKTP63']);
    Route::post('/user63/password', [User63Controller::class, 'putUserPassword63']);

    // API Client User
    Route::view('/apiclient/changePassword63', 'editPW', ['Use_API' => true]);
    Route::get('/apiclient/profile63', [ClientUser63Controller::class, 'profilePage63']);
    Route::post('/apiclient/user63', [ClientUser63Controller::class, 'putUserDetail63']);
    Route::post('/apiclient/user63/photo', [ClientUser63Controller::class, 'putUserPhoto63']);
    Route::post('/apiclient/user63/photoKTP', [ClientUser63Controller::class, 'putUserPhotoKTP63']);
    Route::post('/apiclient/user63/password', [ClientUser63Controller::class, 'putUserPassword63']);
});

// Welcome Page
Route::get('/halo63', [App\Http\Controllers\Halo63Controller::class, 'halo63']);

// Logout Session
Route::get('/logout63', [User63Controller::class, 'logout63'])->middleware('isLogin');
