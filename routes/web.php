<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{UserController, CreateUpdateController, LangController};
use App\Http\Controllers\{MailController, NotificationController, EventListenerController};
use App\Http\Controllers\{GatePolicyController, RepositoryInterfaceController};
use App\Http\Controllers\{ProfileController, ForgotPasswordController, RenderImageController};
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

Route::get('/', function () {
    return view('welcome');
})->name('/');

//cronjob console/commands/---
Route::controller(UserController::class)->group(function(){
    Route::get('user-mail', 'index');
});
//mail
Route::group(['prefix' => 'mail', 'as' => 'mail.'], function(){
    Route::controller(MailController::class)->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/first-mail', 'firstMail')->name('firstMail');
        Route::get('/second-mail', 'secondMail')->name('secondMail');
        Route::get('/third-mail', 'thirdMail')->name('thirdMail');
    });
});
//notification
Route::controller(NotificationController::class)->group(function(){
    Route::get('user-notify', 'index');
});
//event-listener (PostEvent, NotifyUser, NotifyAdmin, UserMail, Post, EventServiceProvider)
Route::controller(EventListenerController::class)->group(function(){
    Route::get('create-post', 'createPost');
});
//repository-interface
Route::controller(RepositoryInterfaceController::class)->group(function(){
    Route::get('blog', 'index');
    Route::get('blog/{id}', 'detail');
});
//create-update
Route::controller(CreateUpdateController::class)->group(function(){
    Route::get('create', 'create')->name('companies.create');
    Route::get('edit/{id}', 'edit')->name('companies.edit');
    Route::post('store', 'store')->name('companies.store');
    Route::post('update/{id}', 'update')->name('companies.update');
});
//cahce
//multi-profile
Route::controller(ProfileController::class)->group(function(){
    Route::get('multi-profile', 'index')->name('pro_index');
    Route::post('multi-profile', 'store')->name('pro_store');
});
//render-images
Route::controller(RenderImageController::class)->prefix('render-img')->as('render-img.')->group(function(){
    Route::get('/', 'index')->name('index');
});
//forget-password
Route::controller(ForgotPasswordController::class)->prefix('fp')->as('fp.')->group(function(){
    Route::view('login', 'forget-pwd.auth.login')->name('login');
    Route::view('register', 'forget-pwd.auth.login')->name('register');
    Route::post('login', 'login')->name('login.post');
    Route::get('logout', 'logout')->name('logout');
    Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
    Route::post('forget-password', 'submitForgetPasswordForm')->name('forget.password.post'); 
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
});
//gate-policy
//lang-translate
Route::controller(LangController::class)->group(function(){
    Route::get('lang/home', 'index')->name('home');
    Route::get('lang/change', 'change')->name('changeLang');

    Route::get('/{locale?}', function ($locale = null) {
        if (isset($locale) && in_array($locale, config('app.available_locales'))) {
            app()->setLocale($locale);
        }
        if(!in_array($locale, config('app.available_locales'))){
            app()->setLocale(config('app.available_locales.Not-Available'));
        };
        return view('welcome');
    });
});
Auth::routes();
Route::controller(GatePolicyController::class)->prefix('gp')->as('gp.')->group(function(){
    Route::get('home', 'index')->middleware(['can:isEmployee'])->name('home');
    Route::get('admin/home', 'handleAdmin')->name('admin.route')->middleware('admin');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::get('/profile/{id}', 'showProfile')->name('profile');
});

