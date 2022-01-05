<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VehicleController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/search', [MainController::class, 'search']);

Route::get('/u/{username}', [UserController::class, 'indexUser']);
Route::get('/u/edit/{username}', [UserController::class, 'editUser']);
Route::post('/u/postedit/{username}', [UserController::class, 'updateUser']);
Route::get('/u/join/{id}', [UserController::class, 'joinAgen']);

Route::get('/regencies', [UserController::class, 'regencies']);
Route::get('/districts', [UserController::class, 'districts']);
Route::get('/village', [UserController::class, 'villages']);

Route::get('/login', function () {
    return view('authentication/login');
});
Route::post('/postlogin', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', function () {
    return view('authentication/register');
});
Route::post('/postregister', [AuthController::class, 'register']);

Route::group(['middleware' => ['auth','checkrole:agent']], function(){
    Route::get('/admin/dashboard', [DashboardController::class, 'index']);
    
    //profil
    Route::get('/a/{username}', [UserController::class, 'indexAgent'])->name('agent.profile');
    Route::get('/a/edit/{id}', [UserController::class, 'editAgent']);    //gabisa pake username karena id user bukan primary table corpo
    Route::post('/a/postedit/{id}', [UserController::class, 'updateAgent']);
    
    //produk
    Route::get('/admin/produk', [ProductController::class, 'index']);
    Route::get('/admin/produk/tambah', [ProductController::class, 'add']);
    Route::post('/admin/produk/tambah/post', [ProductController::class, 'store']);
	Route::get('admin/produk/ubah/{id}', [ProductController::class, 'edit']);
	Route::post('admin/produk/ubah/post/{id}', [ProductController::class, 'update']);
	Route::get('admin/produk/hapus/{id}', [ProductController::class, 'destroy']);
	Route::get('admin/produk/selesai/{id}', [ProductController::class, 'done']);

    //mobil
    Route::get('/admin/mobil', [VehicleController::class, 'index']);
    Route::get('/admin/mobil/tambah', function () {
        return view('admin/kendaraan/tambah_kendaraan');
    });
    Route::post('/admin/mobil/tambah/post', [VehicleController::class, 'carStore']);
	Route::get('admin/mobil/ubah/{id}', [VehicleController::class, 'carEdit']);
	Route::post('admin/mobil/ubah/post/{id}', [VehicleController::class, 'carUpdate']);
	Route::get('admin/mobil/hapus/{id}', [VehicleController::class, 'carDestroy']);

    //transaksi
    Route::get('/admin/transaksi', [TransactionController::class, 'index']);
    Route::get('/admin/transaksi/tambah', [TransactionController::class, 'add']);
    Route::post('/admin/transaksi/tambah/post', [TransactionController::class, 'store']);
	Route::get('admin/transaksi/ubah/{id}', [TransactionController::class, 'edit']);
	Route::post('admin/transaksi/ubah/post/{id}', [TransactionController::class, 'update']);
	Route::get('admin/transaksi/hapus/{id}', [TransactionController::class, 'destroy']);
	Route::get('admin/transaksi/selesai/{id}', [TransactionController::class, 'done']);

    //pajak
    Route::get('/admin/pajak', [TaxController::class, 'index']);
    Route::get('/admin/pajak/tambah', [TaxController::class, 'add']);
    Route::post('/admin/pajak/tambah/post', [TaxController::class, 'store']);
	Route::get('admin/pajak/ubah/{id}', [TaxController::class, 'edit']);
	Route::post('admin/pajak/ubah/post/{id}', [TaxController::class, 'update']);
	Route::get('admin/pajak/hapus/{id}', [TaxController::class, 'destroy']);

    //perawatan
    Route::get('/admin/perawatan', [MaintenanceController::class, 'index']);
    Route::get('/admin/perawatan/tambah', [MaintenanceController::class, 'add']);
    Route::post('/admin/perawatan/tambah/post', [MaintenanceController::class, 'store']);
	Route::get('admin/perawatan/ubah/{id}', [MaintenanceController::class, 'edit']);
	Route::post('admin/perawatan/ubah/post/{id}', [MaintenanceController::class, 'update']);
	Route::get('admin/perawatan/hapus/{id}', [MaintenanceController::class, 'destroy']);
});

Route::group(['middleware' => ['auth','checkrole:superadmin']], function(){
    Route::get('/super-admin/dashboard', [DashboardController::class, 'superadmin_dashboard']);
    Route::get('/super-admin/management_user', [UserController::class, 'superadmin_management_user']);
    Route::get('/super-admin/management_agent', [UserController::class, 'superadmin_management_agent']);
});