<?php

use App\Http\Controllers\TasksController;
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


#route == link == url
Route::get('/', [TasksController::class,'index']);

Route::get('/our_page', function(){
    return view('ourpage');
});


Route::get('/createTaskForm',[TasksController::class,'createTaskForm'])->name('createTaskForm');

Route::post('/createNewTask',[TasksController::class,'createNewTask'])->name('createNewTask');


Route::get('/editTaskForm/{id}',[TasksController::class,'editTaskForm'])->name('editTaskForm');

Route::post('/editTask',[TasksController::class, 'editTask'])->name('editTask');

Route::get('/editAllTasks', [TasksController::class, 'editAllTasks'])->name('editAllTasks');


Route::get('/deleteTask/{id}',[TasksController::class,'deleteTask'])->name('deleteTask');

Route::get('/completedTasks',[TasksController::class,'completedTasks'])->name('completedTasks');

Route::get('/inprogressTasks',[TasksController::class,'inprogressTasks'])->name('inprogressTasks');






/*
composer require laravel/ jetstream
php artisan jetstream:install livewire
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
