<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//  redirect ออกจากหน้า login มาใว้ wellcome
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     if (Auth::check()) {       
//         return view('auth.login');
//     }else{
//         return view('welcome');
//     }
// })->name('index');

Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        return view('auth.login');
    }else{
      
        return view('welcome');
    }
})->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('bk.home');
Route::get('employee/pdf', [App\Http\Controllers\HomeController::class, 'createPDF'])->name('bk.createPDF'); // Dompdf
Route::get('employee/fpdi', [App\Http\Controllers\HomeController::class, 'createFPDI'])->name('bk.createFPDI');  //Fpdi

Route::middleware(['type'])->group(function(){ 

    Route::match(['get','post'],'showperson',[App\Http\Controllers\PkclaimController::class, 'showperson'])->name('per.showperson');// Hos
    Route::match(['get','post'],'line',[App\Http\Controllers\PkclaimController::class, 'line'])->name('per.line');// line
    Route::match(['get','post'],'bar',[App\Http\Controllers\PkclaimController::class, 'bar'])->name('per.bar');//  bar
    Route::match(['get','post'],'bubble',[App\Http\Controllers\PkclaimController::class, 'bubble'])->name('per.bubble');//  bubble  
    Route::match(['get','post'],'polarArea',[App\Http\Controllers\PkclaimController::class, 'polarArea'])->name('per.polarArea');//  polarArea 
    Route::match(['get','post'],'doughnut',[App\Http\Controllers\PkclaimController::class, 'doughnut'])->name('per.doughnut');//  doughnut 

    Route::match(['get','post'],'getbar',[App\Http\Controllers\PkclaimController::class, 'getbar'])->name('per.getbar');// get ค่า ajax bar
    Route::match(['get','post'],'getline',[App\Http\Controllers\PkclaimController::class, 'getline'])->name('per.getline');// get ค่า ajax line
    Route::match(['get','post'],'getbubble',[App\Http\Controllers\PkclaimController::class, 'getbubble'])->name('per.getbubble');// get ค่า ajax bubble
    Route::match(['get','post'],'getpolarArea',[App\Http\Controllers\PkclaimController::class, 'getpolarArea'])->name('per.getpolarArea');// get ค่า ajax polarArea
    Route::match(['get','post'],'getdoughnut',[App\Http\Controllers\PkclaimController::class, 'getdoughnut'])->name('per.getdoughnut');// get ค่า ajax polarArea


    Route::match(['get','post'],'bk_dashboard',[App\Http\Controllers\BkdashboardController::class, 'bk_dashboard'])->name('bk.bk_dashboard');//  
    Route::match(['get','post'],'bk_getbar',[App\Http\Controllers\BkdashboardController::class, 'bk_getbar'])->name('bk.bk_getbar');// get ค่า ajax bar
    Route::match(['get','post'],'bk_getline',[App\Http\Controllers\BkdashboardController::class, 'bk_getline'])->name('bk.bk_getline');// get ค่า ajax line

    Route::get('/users', [App\Http\Controllers\DashboardController::class, 'index'])->name('users.index');

});