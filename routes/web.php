<?php

use App\Http\Controllers\AdminsAuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RubriquesController;
use App\Http\Controllers\UtilisateursController;
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

Route::get('/', [PostsController::class, 'index'])->name('acceuil');
Route::get('contact', [ContactsController::class, 'index'])->name('contact');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('connexion', [UtilisateursController::class, 'login'])->name('connexion')->middleware('alreadyUtilisateurLoggedIn');
Route::get('inscription', [UtilisateursController::class, 'register'])->name('inscription')->middleware('alreadyUtilisateurLoggedIn');
Route::post('create/user', [UtilisateursController::class, "create"])->name('utilisateur.create');
Route::post('check/user', [UtilisateursController::class, "check"])->name('utilisateur.check');
Route::get('logout/user', [UtilisateursController::class, "logout"])->name('utilisateur.logout');

Route::get('admin/login', [AdminsAuthController::class, 'login'])->name('admin.login')->middleware('alreadyAdminLoggedIn');
Route::get('admin/register', [AdminsAuthController::class, 'register'])->name('admin.register')->middleware('alreadyAdminLoggedIn');
Route::post('create', [AdminsAuthController::class, "create"])->name('auth.create');
Route::post('check', [AdminsAuthController::class, "check"])->name('auth.check');
Route::get('admin/connected', [AdminsAuthController::class, "index"])->name('admin.profile')->middleware('adminIsLogged');
Route::get('logout', [AdminsAuthController::class, "logout"])->name('admin.logout');
Route::get('admin/posts', [AdminsAuthController::class, "allPosts"])->name('admin.posts')->middleware('adminIsLogged');
Route::get('admin/rubriques', [AdminsAuthController::class, "allRubriques"])->name('admin.rubriques')->middleware('adminIsLogged');

Route::resource('Rubrique', 'App\Http\Controllers\RubriquesController');
Route::resource('Post', 'App\Http\Controllers\PostsController');
