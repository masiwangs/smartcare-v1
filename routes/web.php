<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Client Area
use App\Http\Controllers\Client\AuthController as ClientAuth;
Route::get('/login', [ClientAuth::class, 'loginView'])->name('login');
Route::post('/login', [ClientAuth::class, 'login']);
Route::get('/logout', [ClientAuth::class, 'logout']);

Route::get('/', function(){
  return view('pages.client.landing');
});

Route::get('/daftar', function(){
  return view('pages.client.daftar');
});
Route::post('/daftar', [ClientAuth::class, 'register']);

use App\Http\Controllers\Client\DashboardController as ClientDashboard;
Route::get('/dashboard', [ClientDashboard::class, 'index'])->middleware('auth');

use App\Http\Controllers\Client\OrderController as ClientOrder;
Route::get('/pesanan', [ClientOrder::class, 'index'])->middleware('auth');
Route::get('/pesanan/{code}', [ClientOrder::class, 'show'])->middleware('auth');
Route::get('/pesanan/{code}/batalkan', [ClientOrder::class, 'cancel'])->middleware('auth');
Route::post('/pesanan/{code}/batalkan', [ClientOrder::class, 'cancelPost'])->middleware('auth');

Route::get('/pesanan-baru/rescue', [ClientOrder::class, 'createRescue']);
Route::post('/pesanan-baru/rescue', [ClientOrder::class, 'storeRescue']);
Route::get('/pesanan-baru/homecare', [ClientOrder::class, 'createHomecare']);
Route::post('/pesanan-baru/homecare', [ClientOrder::class, 'storeHomecare']);
Route::get('/pesanan-baru/homecare/{id}', [ClientOrder::class, 'createHomeCareNext']);
Route::post('/pesanan-baru/homecare/{id}', [ClientOrder::class, 'storeHomeCareNext']);

use App\Http\Controllers\Client\ProfileController as ClientProfile;
Route::get('/profil', [ClientProfile::class, 'index']);
Route::post('/profil', [ClientProfile::class, 'update']);
Route::post('/profil/keamanan', [ClientProfile::class, 'updatePassword']);





// ADMIN AREA
use App\Http\Controllers\Admin\AuthController as AdminAuth;
Route::get('/administrator/login', [AdminAuth::class, 'login_view']);
Route::post('/administrator/login', [AdminAuth::class, 'login']);

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
Route::get('/administrator', [AdminDashboard::class, 'index'])->middleware('admin');

use App\Http\Controllers\Admin\AdminController as AdminAdmin;
Route::get('/administrator/admin', [AdminAdmin::class, 'index']);
Route::get('/administrator/admin-baru', [AdminAdmin::class, 'create']);
Route::post('/administrator/admin-baru', [AdminAdmin::class, 'store']);
Route::get('/administrator/admin/{id}', [AdminAdmin::class, 'show']);
Route::post('/administrator/admin/{id}', [AdminAdmin::class, 'update']);

use App\Http\Controllers\Admin\SubserviceController as AdminSubservice;
Route::get('/administrator/layanan', [AdminSubservice::class, 'index']);
Route::get('/administrator/layanan-baru', [AdminSubservice::class, 'create']);
Route::post('/administrator/layanan-baru', [AdminSubservice::class, 'store']);
Route::get('/administrator/layanan-statistik', [AdminSubservice::class, 'stats']);
Route::get('/administrator/layanan/{slug}', [AdminSubservice::class, 'show']);
Route::post('/administrator/layanan/{slug}', [AdminSubservice::class, 'update']);

use App\Http\Controllers\Admin\OrderController as AdminOrder;
Route::get('/administrator/pesanan', [AdminOrder::class, 'index']);
Route::get('/administrator/pesanan/{code}', [AdminOrder::class, 'edit']);
Route::post('/administrator/pesanan/{code}', [AdminOrder::class, 'update']);
Route::post('/administrator/pesanan/{code}/status', [AdminOrder::class, 'setStatus']);

use App\Http\Controllers\Admin\UserController as AdminUser;
Route::get('/administrator/user', [AdminUser::class, 'index']);