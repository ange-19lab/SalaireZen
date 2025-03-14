<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\DepartementController; 
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\PasswordResetController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'handleLogin'])->name('handleLogin');

//new password
Route::get('/reset-password', [PasswordResetController::class, 'resetPassword']);

//route securisee
Route::middleware('auth')->group(function(){

    Route::get('/dashboard', [AppController::class, 'index'])->middleware('auth')->name('dashboard');
        
    Route::prefix('departements')->group(function(){
        Route::get('/', [DepartementController::class, 'index'])->name('departement.index'); 
        Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
        Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
        Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit'); 
        Route::put('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update'); 

        Route::get('/{departement}', [DepartementController::class, 'delete'])->name('departement.delete');
    });

    Route::prefix('employers')->group(function(){
        Route::get('/', [EmployerController::class, 'index'])->name('employer.index'); 
        Route::get('/create', [EmployerController::class, 'create'])->name('employer.create');
        Route::get('/edit/{employer}', [EmployerController::class, 'edit'])->name('employer.edit'); 

        //Route d'actions
        
        Route::post('/store', [EmployerController::class, 'store'])->name('employe.store');
        Route::put('/update/{employer}', [EmployerController::class,'update'])->name('employe.update');
        Route::get('/delete/{employer}', [EmployerController::class,'delete'])->name('employer.delete');
    });

Route::prefix('configurations')->group(function()
{
        Route::get('/',[ConfigurationController::class, 'index'])->name('configurations'); 
        Route::get('/create',[ConfigurationController::class, 'create'])->name('configurations.create'); 
        
        //route d'actions

        Route::post('/store',[ConfigurationController::class, 'store'])->name('configurations.store');

        Route::get('/delete/{configuration}',[ConfigurationController::class, 'delete'])->name('configurations.delete');

});



});
