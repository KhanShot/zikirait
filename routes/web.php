<?php

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
Route::get('/', function () {
    return redirect()->route("login");
});

Route::middleware(['auth'])->prefix("admin")->group(function (){

    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/users', [\App\Http\Controllers\Admin\AdminController::class, 'users'])->name('users');

    Route::get('/zhuma', [\App\Http\Controllers\Admin\ZhumaController::class, 'index'])->name('zhuma');
    Route::get('/zhuma/create', [\App\Http\Controllers\Admin\ZhumaController::class, 'create'])->name('zhuma.create');
    Route::get('/zhuma/edit/{zhuma_id}', [\App\Http\Controllers\Admin\ZhumaController::class, 'edit'])->name('zhuma.edit');

    Route::post('zhuma/store', [\App\Http\Controllers\Admin\ZhumaController::class, 'store'])->name('zhuma.store');
    Route::post('zhuma/update/{zhuma_id}', [\App\Http\Controllers\Admin\ZhumaController::class, 'update'])->name('zhuma.update');
    Route::delete('zhuma/delete/{zhuma_id}', [\App\Http\Controllers\Admin\ZhumaController::class, 'delete'])->name('zhuma.delete');

})->middleware('admin');


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

