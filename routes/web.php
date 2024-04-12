<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware(['auth','role:admin']);
Route::get('/agent/dashboard',[ManagerController::class,'dashboard'])->name('manager.dashboard')->middleware(['auth','role:manager']);

Route::get('showEmployee',[EmployeeController::class,'showEmployee'])->name('showEmployee');
Route::get('show',[EmployeeController::class,'show'])->name('show');

Route::get('edit-employee/{user}',[EmployeeController::class,'edit'])->name('edit');
Route::PUT('update/{user}',[EmployeeController::class,'update'])->name('update');

Route::delete('delete/{user}',[EmployeeController::class,'destroy'])->name('destroy');

Route::get('dashboard',function(){
    if(Auth::user()->role == 'manager'){
        return view('manager.dashboard');
    }
    else{
        return view('home');
    }    
})->name('back');

Route::get('create-employee',[ManagerController::class,'createEmployee'])->name('insertEmployee');
Route::post('add-employee',[ManagerController::class,'store'])->name('addEmployee');
