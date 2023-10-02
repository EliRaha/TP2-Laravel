<?php

use App\Http\Controllers\VilleController;
use App\Http\Controllers\EtudiantController;
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

Route::get('/ville',[VilleController::class,'index'])->name('ville.index');
Route::get('/ville-edit/{ville}', [VilleController::class, 'edit'])->name('ville.edit');
Route::delete('/ville-delete/{ville}', [VilleController::class, 'destroy'])->name('ville.destroy');
Route::get('/ville-create', [VilleController::class, 'create'])->name('ville.create');
Route::put('/ville-update/{ville}', [VilleController::class, 'update'])->name('ville.update');
Route::get('/ville-show/{ville}', [VilleController::class, 'show'])->name('ville.show');
Route::post('/ville-store', [VilleController::class, 'store'])->name('ville.store');


Route::get('/', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::delete('/etudiant-delete/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.destroy');
Route::get('/etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::put('/etudiant-update/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::get('/etudiant-show/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::post('/etudiant-store', [EtudiantController::class, 'store'])->name('etudiant.store');


Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'showEtudiant'])->name('showEtudiant');
