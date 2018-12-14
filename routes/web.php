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


Route::get('/admin/4', 'AdminIndexController@test4');
Route::get('/admin/5', 'AdminIndexController@test5');
Route::get('/admin/6', 'AdminIndexController@test6');
Route::get('/admin/7', 'AdminIndexController@test7');

Route::get('/admin/promotion', 'AdminIndexController@promotion');
Route::post('/admin/promotion/del', 'AdminIndexController@promotion_del');
Route::post('/admin/promotion/add', 'AdminIndexController@promotion_add');

Route::post('/admin/promotion/edit', 'AdminIndexController@promotion_edit');