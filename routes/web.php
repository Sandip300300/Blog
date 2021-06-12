<?php

use App\Http\Controllers\Admin_auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Post;
use App\Http\Controllers\Admin\Page;
use App\Http\Controllers\front\PostController;
use App\Http\Controllers\Admin\Contact;

Route::get('/',[PostController::class,'home']);
Route::get('/post/{id}',[PostController::class,'post']);
Route::get('/page/{id}',[PostController::class,'page']);


Route::view('/admin/login', 'admin.login');

Route::post('/admin/login_submit',[Admin_auth::class,'login_submit']);

Route::get('admin/logout', function () {
    session()->forget('BLOG_USER_ID');
    return redirect('/admin/login');

});
Route::group(['middleware'=>['admin_auth']],function(){


    Route::view('/admin/post/edit','admin.post.edit');
    Route::view('/admin/page/add','admin.page.add');
    Route::get('/admin/post/list',[Post::class,'listing']);
Route::view('/admin/post/add','admin.post.add');
Route::post('/admin/post/submit',[Post::class,'submit']);
Route::get('/admin/post/edit/{id}',[Post::class,'edit']);
Route::get('/admin/post/delete/{id}',[Post::class,'delete']);
Route::post('/admin/post/update/{id}',[Post::class,'update']);
Route::get('/admin/page/list',[Page::class,'listing']);

	Route::post('/admin/page/submit',[Page::class,'submit']);
	Route::get('/admin/page/delete/{id}',[Page::class,'delete']);
	Route::get('/admin/page/edit/{id}',[Page::class,'edit']);
	Route::post('/admin/page/update/{id}',[Page::class ,'update']);
    Route::get('/admin/contact/list',[Contact::class,'listing']);


});


