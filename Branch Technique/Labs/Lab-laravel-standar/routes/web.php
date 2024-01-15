<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;

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

// Route::get('/', function () {
//     return view('Projects.index');
// });
Route::get('/',[ProjectsController::class,'index'])->name('home');
// Route::post('/',[ProjectsController::class,'create'])->name('create');

// Route::put('update',[ProjectsController::class,'edit'])->name('edit');
// Route::delete('destroy',[ProjectsController::class,'destroy'])->name('destroy');

Route::get('projects/tasks/{projetId}',[TasksController::class,'index'])->name('projects.tasks');

Route::resource('tasks', TasksController::class);
Route::resource('projects', ProjectsController::class);

