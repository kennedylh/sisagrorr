<?php
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
use Illuminate\Http\Request;
use Telegram\Bot\Api;

Route::group(['prefix' => 'painel'], function(){
    //permissionController
    Route::get('permissions', 'painel\PermissionController@index');
    //permissionController
    Route::get('users', 'painel\UserController@index');
    //rolesController
    Route::get('roles', 'painel\RoleController@index');
    Route::get('roles/{id}/edit', 'painel\RoleController@edit');
    //Route::get('role/{id}/permissions', 'painel\RoleController@permissions');
    //painel controller
    Route::get('/', 'painel\PainelController@index');
});

//cadastro de produtos
Route::resource('/produtos', 'ProdutosController');
Route::post('/produtos/busca', 'ProdutosController@busca');
Route::get('/roles-permission', 'ProdutosController@rolesPermissions');
//entrada de produtos
Route::resource('/produtos_entries', 'ProdutosEntriesController');
Route::post('/produtos_entries/busca', 'ProdutosEntriesController@busca');
//cadastro de categoria
Route::resource('/categories', 'CategoriesController');
//cadastro de fornecedores
Route::resource('/supplier', 'SupplierController');
//saída de produtos
Route::resource('/produtos_outputs', 'ProdutosOutputsController');
Route::get('/amount/{id}', 'ProdutosOutputsController@amount');
Route::post('/produtos_outputs/busca', 'ProdutosOutputsController@busca');
//users
Route::resource('/users', 'UserController');

//alerts
Route::group(['prefix' => 'alerts'], function(){
    //regrasController
    Route::resource('rules', 'RulesController');
    //notificaçõesController
    Route::get('notifications', 'NotificationsController@index');
    //notificaçõesLida
    Route::get('notifications/read/{id}', 'NotificationsController@read');
    //delete
    Route::resource('notifications', 'NotificationsController');
});

//users
Route::resource('/logs', 'LogController');

//profile
Route::get('/profile', function(){
     return view('profile.index');
});
//Login
Route::get('/', function(){
     return view('auth.login');
});

//Login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/bot/getupdates', function() {
      $activity = Telegram::getUpdates();
      dd($activity);
});
