<?php

use App\Http\Controllers\backend\AboutController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\AboutController as FrontendAboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\SettingMiddleware;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts/{slug}', [HomeController::class, 'show'])->name('home.show');

Route::get('/about', [FrontendAboutController::class, 'index'])->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'send'])->name('send');

Route::get('/locale/{locale}', function ($locale) {
    app()->setlocale($locale);
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

    Route::resource('post', PostController::class)->middleware('permission:post view');
    Route::get('trash', [PostController::class, 'trash'])->name('post.trash');
    Route::delete('force-delete/{id}', [PostController::class, 'delete'])->name('post.force-delete');
    Route::get('restore/{id}', [PostController::class, 'restore'])->name('post.restore');

    Route::get('admin/about', [AboutController::class, 'index'])->name('about.index')->middleware('permission:about view');
    Route::post('admin/about', [AboutController::class, 'update'])->name('about.update')->middleware('permission:about update');

    Route::get('setting', [SettingController::class, 'index'])->name('setting.index')->middleware('permission:setting view');
    Route::post('setting', [SettingController::class, 'update'])->name('setting.update')->middleware('permission:setting update');

    Route::resource('user', UserController::class)->middleware('permission:user view');

    Route::resource('role', RoleController::class)->middleware('permission:role view');
    Route::post('permission/{role}', [RoleController::class, 'assignPermission'])->name('role.assign');

    // Route::get('/test', function() {
    //     return Post::find(2)->->user->name;
    // });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
