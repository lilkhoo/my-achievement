<?php

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\MyCertificatesController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Certificate;
use App\Http\Controllers\UserController;
use App\Models\User\User as UserUser;
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
    $data = [
        'title' => 'Users | MyAchievement',
    ];

    if (request('search')) {
        $data['users'] = User::filter(request(['search']))->get();
    } else {
        $data['users'] = [User::firstWhere('id', 1), User::firstWhere('id', 2), User::firstWhere('id', 3)];
    }

    return view('users.index', $data);
})->middleware(['auth'])->name('user');

// Route Profil
Route::get('/profil', function () {
    return view('profil.index', [
        'title' => Auth::user()->username . ' | MyAchievement',
        'certificates' => Certificate::filter(request(['s', 'sort']))->where('user_id', Auth::id())->orderBy('course')->paginate(12),
    ]);
})->middleware(['auth'])->name('profil');

// Route Peringkat
Route::get('/peringkat', function () {
    // SELECT users.*, (SELECT count(1) FROM certificates WHERE users.id = certificates.user_id) AS total FROM users ORDER BY total DESC

    return view('peringkat.index', [
        'title' => 'Peringkat | MyAchievement',
        'users' => User::selectRaw('users.*, (SELECT count(1) FROM certificates WHERE users.id = certificates.user_id) AS total')->reorder('total', 'desc')->limit(10)->get()
    ]);
})->middleware(['auth'])->name('user');

// Route Akun
Route::get('/akun', function () {
    return view('accounts.index', [
        'title' => Auth::user()->username . ' | MyAchievement',
        'user' => User::firstWhere('id', Auth::id())
    ]);
})->middleware(['auth'])->name('account');

Route::post('/akun/{user:id}', [UserController::class, 'update']);

require __DIR__ . '/auth.php';
