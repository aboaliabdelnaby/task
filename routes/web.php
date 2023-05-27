<?php

use App\Http\Livewire\Admin\Company\CompanyCreate;
use App\Http\Livewire\Admin\Company\CompanyEdit;
use App\Http\Livewire\Admin\Company\CompanyIndex;
use App\Http\Livewire\Admin\Company\CompanyShow;
use App\Http\Livewire\Admin\Employee\EmployeeEdit;
use App\Http\Livewire\Admin\Employee\EmployeeIndex;
use App\Http\Livewire\Admin\Employee\EmployeeShow;
use App\Http\Livewire\Home;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
    Route::group(['prefix' => 'company', 'as' => 'company.'], static function () {
        Route::get('index', CompanyIndex::class)->name('index');
        Route::get('edit/{company}', CompanyEdit::class)->name('edit')->where('company', '[0-9]+');
        Route::get('show/{company}', CompanyShow::class)->name('show')->where('company', '[0-9]+');
    });
    Route::group(['prefix' => 'employee', 'as' => 'employee.'], static function () {
        Route::get('index', EmployeeIndex::class)->name('index');
        Route::get('edit/{employee}', EmployeeEdit::class)->name('edit')->where('employee', '[0-9]+');
        Route::get('show/{employee}', EmployeeShow::class)->name('show')->where('employee', '[0-9]+');
    });
});

Route::get('/home', Home::class)->name('home');
