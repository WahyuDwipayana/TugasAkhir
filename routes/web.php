<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailMenu;
use App\Http\Controllers\DetailReservasiController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterPegawaiController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ReservasiUserController;
use App\Models\DetailReservasi;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\TemusapaController;
// use App\Http\Controllers\TestCRUD;
use App\Models\Meja;
use App\Models\Menu;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\Mention\Mention;
use Monolog\Registry;
use PhpParser\Node\Stmt\GroupUse;
use PHPUnit\Framework\Test;
use PHPUnit\TextUI\XmlConfiguration\Group;

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


// function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'index']) ->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    // Register Admin
    Route::get('/registeradmin', [RegisterAdminController::class, 'index']);
    Route::post('/registeradmin', [RegisterAdminController::class, 'store']);
    Route::get('/registerpegawai', [RegisterPegawaiController::class, 'index']);
    Route::post('/registerpegawai', [RegisterPegawaiController::class, 'store']);
});
Route::post('/logout',[LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Meja
    Route::resource('/dashboard/meja', MejaController::class);
    
    Route::prefix('dashboard')->group(function(){
        Route::resource('meja', MejaController::class);
        Route::resource('hari', HariController::class);
        Route::resource('jam', JamController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('reservasi', ReservasiController::class);
    });

    Route::resource('reservasi', ReservasiUserController::class);
    Route::resource('/detail', DetailReservasiController::class);
    Route::get('/meja/{id}', [HomeController::class, 'indexmeja']);
    Route::put('/menu/{meja}/', [HomeController::class, 'indexmenu']);
    Route::put('/menu', [HomeController::class, 'tambahmenu']);

    // // Reservasi
    // Route::get('/dashboard/reservasi', [ReservasiController::class, 'index']);
});


// Menu
// Route::get('/dashboard/meja', [MejaController::class, 'index']);
// Route::get('/dashboard/menu', [MenuController::class, 'index']);
// Route::post('/dashboard/menu', [MenuController::class, 'store']);
// Route::get('/dashboard/menu/tambahmenu', [MenuController::class, 'create']);
// Route::get('/dashboard/menu/editmenu/{id}', [MenuController::class, 'edit']);
// Route::post('/dashboard/menu/{id}', [MenuController::class, 'update']);
// Route::delete('dashboard/menu/{id}', [MenuController::class, 'destroy']);

// Route::get('login', [''])

// Route::get('home', [HomeController::class, 'index']);

// Route::middleware(['guest'])->group(function () {
//     Route::get('/login',[LoginController::class, 'index']);
//     Route::get('/',[HomeController::class, 'index']);

//     Route::get('/reset',[LoginController::class, 'resetForm']);
//     Route::get('/reset',[ResetController::class, 'index']);
//     Route::post('/reset/proses',[ResetController::class, 'reset']);
//     Route::post('/login',[LoginController::class, 'authenticate']);
//     Route::get('/registrasi',[RegisterController::class, 'index']);
//     Route::post('/registrasi',[RegisterController::class, 'store']);
// });

// Dashboard Menu
// Route::get('dashboard/menu', [MenuController::class, 'index']);
// Route::get('dashboard/menu/tambahmenu', [MenuController::class,'tambahmenu']);
// Route::get('dashboard/menu/editmenu', [MenuController::class, 'editmenu']);
// Route::post('dashboard/menu/', [MenuController::class, 'tambah']);
// Route::post('dashboard/menu/editmenu/{id}', [MenuController::class, 'edit']);