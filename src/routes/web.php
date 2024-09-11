<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

// ゲストにのみアクセスを許可するルート
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
});

//会員登録
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
//ログイン・ログアウト
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
//商品
Route::get('/', [ItemController::class, 'index'])->name('items.index');
Route::get('/display_item', [ItemController::class, 'create'])->name('item.create'); // 出品ページの表示
Route::post('/display_item', [ItemController::class, 'store'])->name('item.store');  // 出品アイテムの保存