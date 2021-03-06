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

Route::get("/", function () {
    return view("welcome");
});

//3.http://XXXXXX.jp/XXX というアクセスが来たときに、 
//AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください。

Route::get("XXX", "Admin\AAAController@bbb");

//【応用】 前章でAdmin/ProfileControllerを作成し、add Action, edit Actionを追加しました。
//web.phpを編集して、admin/profile/create にアクセスしたら
//ProfileController の add Action に、admin/profile/edit にアクセスしたら 
//ProfileController の edit Action に割り当てるように設定してください。

Auth::routes();

Route::get("/home", "HomeController@index")->name("home");

Route::group(["prefix" => "admin", "middleware" => "auth"], function() {
    Route::get("news/create","Admin\NewsController@add")->middleware("auth");
    Route::post("news/create", "Admin\NewsController@create");
});

    
Route::group(["prefix" => "admin"], function() {
    Route::get("profile/create","Admin\ProfileController@add")->middleware("auth");
    Route::post("profile/create", "Admin\ProfileController@create");
    
    Route::get("profile/edit", "Admin\ProfileController@edit")->middleware("auth");
    Route::post("profile/edit", "Admin\ProfileController@update");
});

Auth::routes();

Route::get("/home", "HomeController@index")->name("home");
