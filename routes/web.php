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

/* ログイン認証機能 */
Auth::routes(

);
/* ログアウト */
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

/*　会員登録　*/
Route::get('member_regist', 'MemberController@show')->name('regist_show');
Route::post('member_regist','MemberController@post')->name('regist_post');
Route::get('member_confirmation', 'MemberController@confirm')->name('confirmation_confirm');
Route::post('member_confirmation','MemberController@add')->name('confirmation_add');
Route::get('member_registered','MemberController@complete')->name('member_registered');

/* トップページ */
Route::get('/top', function () {
    return view('top');
})->name('top');

Route::get('/password_reset_message', function () {
    return view('password_reset_message');
})->name('password_reset_message');

/* 商品登録 */
Route::get('product_regist', 'ProductController@show')->name('product_regist_show');
Route::post('product_regist', 'ProductController@post')->name('product_post');
Route::get('product_confirmation', 'ProductController@confirm')->name('product_confirm');
Route::post('product_confirmation', 'ProductController@add')->name('product_add');
//小カテゴリ
Route::post('/subcategory','ProductController@subcategory');
//画像アップロード
Route::post('/images', 'ProductController@imageUpload');

?>
