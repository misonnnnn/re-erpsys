<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ModulesController;
use Illuminate\Support\Facades\Auth;
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
Route::get  ('/',             function(){
    if(!Auth::check()){
        return redirect('/auth/login');
    }else{
        return redirect('/dashboard');
    }
});

Route::get  ('/auth/login',        [AuthController::class,'index']);
Route::post ('/auth/authRequest',   [AuthController::class,'authRequest']);
Route::get  ('/auth/logout',        [AuthController::class,'logout']);

Route::middleware([App\Http\Middleware\isLogin::class])->group(function () {
    if(Request()->segment(1)!== 'auth' && Request()->segment(1)!== 'api'  ){
        Route::get('/{any}', function () {
            return view('masterlayout');
        })->where('any', '.*');
    }
});


// API's
Route::get  ('/auth/getFullName', function () {
    return Auth::user()->firstname.' '.Auth::user()->lastname;
});
Route::get('/auth/status', function () {
    return response()->json(['authenticated' => auth()->check()]);
});



Route::get  ('/api/getmodulescategory',        [GeneralController::class,'getModuleCategory']);
Route::get  ('/api/getallmodulecategory',        [ModulesController::class,'getallmodulecategory']);
Route::get  ('/api/getallmodules',        [ModulesController::class,'getallmodules']);


// INSERT 
Route::post  ('/insert/menucategory',        [ModulesController::class,'insertMenuCategory']);
Route::post  ('/insert/module',              [ModulesController::class,'insertModule']);