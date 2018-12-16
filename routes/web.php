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

Route::get('/', function () {
    return view('welcome');
});
/* --- Older Route Dont use ------*/
Route::get('/admin', 'AdminIndexController@index');
Route::get('/admin/hq', 'AdminHQController@index');
Route::get('/admin/hq/add', 'AdminHQController@add_show');
Route::post('/admin/hq/add', 'AdminHQController@add');
Route::get('/admin/hq/show', 'AdminHQController@hq_show');
Route::match(['get', 'post'], '/admin/hq/edit', 'AdminHQController@edit');
Route::match(['get', 'post'], '/admin/hq/edit/send', 'AdminHQController@edit_send');
Route::post('/admin/hq/delete', 'AdminHQController@delete');
Route::get('/admin/branch', 'AdminBranchController@index');


Route::get('/admin/branch/show', 'AdminBranchController@show');
Route::match(['get', 'post'], '/admin/branch/add', 'AdminBranchController@add');
Route::match(['get', 'post'], '/admin/branch/edit', 'AdminBranchController@edit');
Route::match(['get', 'post'], '/admin/branch/edit/send', 'AdminBranchController@edit_send');
Route::post('/admin/branch/delete', 'AdminBranchController@delete');

/* --- END Older Route Dont use ---- */


Route::get('/admin/transcription', 'AdminIndexController@test4');
Route::get('/admin/loan', 'AdminIndexController@test4');
Route::get('/admin/user', 'AdminUserController@index');

Route::get('/admin/todo', 'AdminIndexController@test7');

Route::get('/admin/promotion', 'AdminIndexController@test6');
Route::get('/admin/promotion/manage', 'AdminIndexController@promotion');
Route::post('/admin/promotion/del', 'AdminIndexController@promotion_del');
Route::post('/admin/promotion/add', 'AdminIndexController@promotion_add');


Route::get('/admin/customer', 'AdminIndexController@customerDetail');
Route::post('/admin/customer/request', 'AdminIndexController@customerDetailRequest');


Route::get('/admin/loan', 'AdminLoanController@loan');
Route::post('/admin/loan/add', 'AdminLoanController@add');
Route::post('/admin/loan/del', 'AdminLoanController@del');


/*--- Admin User manage ---*/
Route::get('/admin/user/show', 'AdminUserController@show');
Route::get('/admin/user/pwd-print', 'AdminUserController@printpwd');
Route::match(['get', 'post'], '/admin/user/add', 'AdminUserController@add');
Route::match(['get', 'post'], '/admin/user/edit', 'AdminUserController@edit');
Route::match(['get', 'post'], '/admin/user/edit/send', 'AdminUserController@edit_send');
Route::post('/admin/user/delete', 'AdminUserController@delete');