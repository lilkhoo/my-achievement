<?php

use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\MyCertificatesController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Certificate;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [CertificatesController::class, 'index'])->middleware(['auth']);
Route::resource('/certificates', MyCertificatesController::class)->middleware(['auth']);

// Route User
Route::get('/user', function () {

    return view('users.index', [
        'title' => 'Users | MyAchievement',
        'users' => [User::firstWhere('id', 1), User::firstWhere('id', 2), User::firstWhere('id', 3)]
    ]);
})->middleware(['auth'])->name('user');


// Route Profil
Route::get('/profil', function () {

    return view('profil.index', [
        'title' => Auth::user()->username . '| MyAchievement',
        'certificates' => Certificate::filter(request(['s', 'sort']))->where('user_id', Auth::id())->orderBy('course')->paginate(12),
    ]);
})->middleware(['auth'])->name('profil');

Route::get('/peringkat', function () {

    return view('peringkat.index', [
        'title' => 'Peringkat | MyAchievement',
        'users' => [User::firstWhere('id', 1), User::firstWhere('id', 2), User::firstWhere('id', 3)]
    ]);
})->middleware(['auth'])->name('user');


Route::get('/akun', function () {

    return view('accounts.index', [
        'title' => Auth::user()->username . '| MyAchievement',
        'user' => User::firstWhere('id', Auth::id())
    ]);
})->middleware(['auth'])->name('account');

Route::post('/akun/{user:id}', [UserController::class, 'update']);



require __DIR__ . '/auth.php';
