<?php

use Illuminate\Support\Facades\Route;
use App\Models\listing;
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

Route::get('/', ["App\Http\Controllers\listingController","index"]);
Route::get('/listings/create', ["App\Http\Controllers\listingController","create"])->middleware("auth");
Route::get("/listings/manage",["App\Http\Controllers\listingController","manage"])->middleware("auth");

Route::get("/listing/{listing}",["App\Http\Controllers\listingController","show"]);
Route::get("/listings/{listing}",["App\Http\Controllers\listingController","show"]);


Route::post('/listings', ["App\Http\Controllers\listingController","store"])->middleware("auth");

Route::get("/listings/{listing}/edit",["App\Http\Controllers\listingController","edit"])->middleware("auth");

Route::put("/listings/{listing}",["App\Http\Controllers\listingController","update"])->middleware("auth");

Route::delete("/listings/{listing}",["App\Http\Controllers\listingController","destroy"])->middleware("auth");

Route::get("/register",["App\Http\Controllers\userController","register"])->middleware("guest");

Route::post("/register",["App\Http\Controllers\userController","store"]);

Route::post("/logout",["App\Http\Controllers\userController","logout"])->middleware("auth");

Route::get("/login",["App\Http\Controllers\userController","login"])->middleware("guest")->name("login");

Route::post("/users/authenticate",["App\Http\Controllers\userController","authenticate"]);






