<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::get('/', function () {
    return view('authentication.land');
})->name('homepage');*/
Route::get('/', function () {
    return view('index');
})->name('homepage');
Route::get('/buy',function (){
    return view('index');
})->name('homepage2');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang',function (){
    return view('lang.lang');
});
/*Route::prefix('fa')->group(function (){
    //app()->setLocale('fa');
    \Illuminate\Support\Facades\App::setLocale('fa');
    Route::get('lang',function (){
        return view('lang.lang');
    });
});
Route::get('/myregister',function (){
    return view('authentication.register');
});
Route::get('/mylogin',function (){
    return view('authentication.login');
});*/
Route::group(['prefix' => 'auth','namespace' => 'Auth'],function (){
    Route::get('/register','RegisterController@showMyRegisterForm')->name('auth.register.form');
    Route::post('register','RegisterController@register')->name('auth.register');
    Route::get('/login','LoginController@showLoginForm')->name('auth.login.form');
    //Route::post('/login','LoginController@Login')->name('auth.login');
    Route::get('/logout','LoginController@logout')->name('auth.logout');
});
Route::get('/logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
});
/*Route::get('/url',function (){
    \Illuminate\Support\Facades\URL::temporarySignedRoute('email',now()->addMinute(100),['name','anisa']);
});
Route::get('/email',function (){})->name('email');
Route::get('/email/verification','Auth\VerificationController@send')->name('email.verification');
Route::get('/email/verify','Auth\VerificationController@verify')->name('email.verify');*/
////////////////////////////////////////////////////////
Route::get('/admin',function (){
    return view('back.index');
})->middleware(['auth','isadmin']);
//Route::resource('/profile','Auth\ProfileController');
Route::get('/profile/{user}','Auth\ProfileController@edit')->name('profile');
Route::post('/update/{user}','Auth\ProfileController@update')->name('profileupdate');
Route::resource('categories','back\CategoryController');
Route::get('showdeletecategory','back\CategoryController@showDeleteCategory')->name('show-delete-category');
Route::get('restorecategory/{id}','back\CategoryController@restoreCategory')->name('restore-category');
Route::get('forcedeletecategory/{id}','back\CategoryController@forceDelete')->name('force-delete-category');
//Route::get('users','back\UserController@index')->name('admin.users');
Route::resource('users','back\UserController');
Route::get('showblockuser','back\UserController@blockShow')->name('show-block-user');
Route::get('restoreuser/{id}','back\UserController@restoreUser')->name('restore-user');
Route::get('forcedelete/{id}','back\UserController@forceDelete')->name('force-delete');
Route::resource('permissions','back\PermissionController');
Route::get('showdeletepermission','back\PermissionController@showDeletePermission')->name('show-delete-permission');
Route::get('restorepermission/{id}','back\PermissionController@restorePermission')->name('restore-permission');
Route::get('forcedelete/{id}','back\PermissionController@forceDelete')->name('force-delete');
Route::resource('roles','back\RoleController');
Route::get('showdeleterole','back\RoleController@showDeleteRoles')->name('show-delete-role');
Route::get('restorerole/{id}','back\RoleController@restoreRole')->name('restore-role');
Route::get('forcedelete/{id}','back\RoleController@forceDelete')->name('force-delete');
Route::resource('articles','back\ArticleController');
Route::get('/test',function (){
    dd(auth()->user()->hasPermission('block-user'));
});

Route::get('/session',function (\Illuminate\Http\Request $request){

    return $request->session()->all();
});
Route::get('/email',function (){
    $notification=new App\Services\Notification\Notification();
    $notification->sendSms();
});
