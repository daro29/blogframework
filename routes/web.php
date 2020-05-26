<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/','blog');

Auth::routes();

Route::get('blog', 'web\PageController@blog')->name('blog');

Route::get('entrada/{slug}',    'web\PageController@post')      ->name('post');
Route::get('categoria/{slug}',  'web\PageController@category')  ->name('category');
Route::get('etiqueta/{slug}',   'web\PageController@tag')       ->name('tag');
Route::post('buscar/post',       'web\PageController@search')    ->name('search');

//admin
Route::resource('admin/tags',         'Admin\TagController');
Route::resource('admin/categories',   'Admin\CategoryController');
Route::resource('admin/posts',        'Admin\PostController');

//User
Route::resource('usuario/posts',    'User\PostController')->names('user.posts');
