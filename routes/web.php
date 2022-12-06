<?php

use App\Http\Controllers\CharactersController;
use App\Http\Controllers\SchoolController;
use App\Models\School;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\JoinController;
use Psy\SuperglobalsEnv;
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
///Route::get('/', function () {
    ///return view('welcome');
///});

//Route::group(['middleware' => 'auth'], function(){
//    Route::get('/', [CharactersController::class, 'index'])->name('Characters.index');
//});

Route::get('Profil/add', [ProfilController::class, 'create'])->name('Profil.create');
Route::post('Profil/store', [ProfilController::class, 'store'])->name('Profil.store');
Route::get('Profil/', [ProfilController::class, 'index'])->name('Profil.index');
Route::get('Profil/edit/{id}', [ProfilController::class, 'edit'])->name('Profil.edit');
Route::post('Profil/update/{id}', [ProfilController::class, 'update'])->name('Profil.update');
Route::post('Profil/delete/{id}', [ProfilController::class, 'delete'])->name('Profil.delete');
Route::post('Profil/hardDelete/{id}', [ProfilController::class, 'hardDelete'])->name('Profil.hardDelete');
Route::post('Profil/restore/{id}', [ProfilController::class, 'restore'])->name('Profil.restore');
Route::get('Profil/indexDelete', [ProfilController::class, 'indexDelete'])->name('Profil.indexDelete');



Route::get('School/add', [SchoolController::class, 'create'])->name('School.create');
Route::post('School/store', [SchoolController::class, 'store'])->name('School.store');
Route::get('School/', [SchoolController::class, 'index'])->name('School.index');
Route::get('School/edit/{id}', [SchoolController::class, 'edit'])->name('School.edit');
Route::post('School/update/{id}', [SchoolController::class, 'update'])->name('School.update');
Route::post('School/delete/{id}', [SchoolController::class, 'delete'])->name('School.delete');
Route::post('School/hardDelete/{id}', [SchoolController::class, 'hardDelete'])->name('School.hardDelete');
Route::post('School/restore/{id}', [SchoolController::class, 'restore'])->name('School.restore');
Route::get('School/indexDelete', [SchoolController::class, 'indexDelete'])->name('School.indexDelete');


Route::get('Characters/add', [CharactersController::class, 'create'])->name('Characters.create');
Route::post('Characters/store', [CharactersController::class, 'store'])->name('Characters.store');
Route::get('Characters/', [CharactersController::class, 'index'])->name('Characters.index');
Route::get('Characters/edit/{id}', [CharactersController::class, 'edit'])->name('Characters.edit');
Route::post('Characters/update/{id}', [CharactersController::class, 'update'])->name('Characters.update');
Route::post('Characters/delete/{id}', [CharactersController::class, 'delete'])->name('Characters.delete');
Route::post('Characters/hardDelete/{id}', [CharactersController::class, 'hardDelete'])->name('Characters.hardDelete');
Route::post('Characters/restore/{id}', [CharactersController::class, 'restore'])->name('Characters.restore');
Route::get('Characters/indexDelete', [CharactersController::class, 'indexDelete'])->name('Characters.indexDelete');
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/join', [JoinController::class, 'index'])->name('join.index');
