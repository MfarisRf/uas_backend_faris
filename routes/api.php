<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\User63Controller;
use App\Http\Controllers\api\Agama63Controller;


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

Route::get("/user63", [User63Controller::class, "getUsers63"]);
Route::get("/user63/{id}", [User63Controller::class, "getUserDetail63"]);
Route::put("/user63/{id}", [User63Controller::class, "putUserDetail63"]);
Route::put("/user63/{id}/photo", [User63Controller::class, "putUserPhoto63"]);
Route::put("/user63/{id}/photoKTP", [User63Controller::class, "putUserPhotoKTP63"]);
Route::put("/user63/{id}/password", [User63Controller::class, "putUserPassword63"]);
Route::put("/user63/{id}/status", [User63Controller::class, "putUserStatus63"]);
Route::put("/user63/{id}/agama", [User63Controller::class, "putUserAgama63"]);
Route::delete("/user63/{id}", [User63Controller::class, "deleteUser63"]);

Route::get("/agama63", [Agama63Controller::class, "getAgama63"]);
Route::get("/agama63/{id}", [Agama63Controller::class, "getDetailAgama63"]);
Route::post("/agama63", [Agama63Controller::class, "postAgama63"]);
Route::put("/agama63/{id}", [Agama63Controller::class, "putAgama63"]);
Route::delete("/agama63/{id}", [Agama63Controller::class, "deleteAgama63"]);
