<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexCon;
use App\Http\Controllers\Admin\RoleCon;
use App\Http\Controllers\Admin\PermissionCon;
use App\Http\Controllers\Admin\UserCon;
use App\Http\Controllers\Admin\BlogCon;
use App\Http\Controllers\Admin\GoogleAuthCon;
use App\Http\Controllers\Admin\FacebookAuthCon;
use App\Http\Controllers\Front\FrontCon;
use App\Models\Blog;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::name('trip.')->prefix('trip')->group(function(){
        Route::get('/',[FrontCon::class,'index'])->name('index');
        Route::get('/single/{id}',[FrontCon::class,'single_post'])->name('single.page');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:SuperAdmin|Admin',
])->group(function () {
    Route::get('/dashboard', function () {
            return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:SuperAdmin'])->name('superadmin.')->prefix('superadmin')->group(function(){
    Route::get('/',[IndexCon::class,'index'])->name('index');
    Route::resource('/roles',RoleCon::class);
    Route::post('/roles/{role}/permission',[RoleCon::class,'add_permission'])->name('give.permission');
    Route::delete('{role}/permission//{p_name}',[RoleCon::class,'restrok_permission'])->name('restrok.permission');
    Route::resource('/permissions',PermissionCon::class);
    
});
Route::middleware(['auth', 'role:SuperAdmin|Admin'])->name('superadmin.')->prefix('both')->group(function(){
    Route::resource('/users',UserCon::class);
    Route::post('/users/{user_id}/role',[UserCon::class,'add_role_user'])->name('user.add.role');
    Route::post('/users/{user_id}/trash',[UserCon::class,'soft_delete'])->name('user.trash');
    Route::post('/users/{user_id}/restore',[UserCon::class,'restore_user'])->name('user.restore');
    Route::get('/user/trash',[UserCon::class,'trash_page'])->name('users.trash.page');
    
});
Route::middleware(['can:Create Blog'])->name('blog.')->group(function(){
    Route::resource('/post',BlogCon::class);
    Route::get('/add-blog',[BlogCon::class,'show_blog_form'])->name('show.form');
});

Route::get('/feed',[BlogCon::class,'feed_blog']);
Route::get('/Google',[GoogleAuthCon::class,'loginWithGoogle'])->name('g_login');
Route::any('/Google/callback',[GoogleAuthCon::class,'callbackFromGoogle'])->name('g_login_callback');

Route::get('/Facebook',[FacebookAuthCon::class,'loginWithFacebook'])->name('facebook_login');
Route::get('/auth/facebook/callback',[FacebookAuthCon::class,'callbackFromFacebook'])->name('facebook_login_callback');
