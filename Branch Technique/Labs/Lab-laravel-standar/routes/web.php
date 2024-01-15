<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ProjectsController::class, "index"])->name("projects.index");
Route::resource("projects", ProjectsController::class);

Route::resource('taches', TasksController::class);
Route::get('projet/{projectId}/taches', [TasksController::class, "getTasksByProjectId"])->name("projects.tasks");
