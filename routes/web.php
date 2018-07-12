<?php
use App\Task;

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

// http://90ff7677c5624b888942861c5908a5fb.vfs.cloud9.us-east-2.amazonaws.com/tasks
// サイトの場所(Address) / リクエストをサイトの場所に送った際にサイトの場所で何を(トップページを表示する)してもらうか

// 例: http://90ff7677c5624b888942861c5908a5fb.vfs.cloud9.us-east-2.amazonaws.com/tasks
// /tasks = リクエストをサイトの場所に送った際にサイトの場所で何をしてもらうか = URI
// ルーティングとは？
// /tasks の情報を元にどの処理を行うか(Controller)決めるためのもの
// Route::get(URI, 何をするのか);

// URI が '/' の時に TasksController@index を実行する
// URI が / リクエストメソッドが POST の時は何が行われる？
// そんな条件はない！ => プログラムは何をすれば良いかわからない => エラー => Route not found
Route::get('/', 'TasksController@index');

    //<a href="{{ route('login') }}">Login</a>
    //<a href="{{ route('register') }}">Register</a>

//ユーザー
// URIが 'signup' の時に Auth\RegisterController@showRegistrationForm を実行する
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');


// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
// get?post? どういう意味？ get=取得する post=投稿する
// リクエスト = URLを叩くこと
// リクエストには URI の情報 と リクエストメソッド（GET or POST)の情報が含まれる
// リクエストメソッドがPOSTで。しかもURIが 'login' の時に Auth\LoginController@login を実行する

// ->name() ? 
// 「リクエストメソッドがPOSTで。しかもURIが 'login' の時」 <= 説明が長い
// 説明が長いから一文字で表現したい => じゃあ名前をつけよう => name()
// Route::post('login', 'Auth\LoginController@login')->name('なんでも良いがわかりやすい名前');
Route::post('login', 'Auth\LoginController@login')->name('login.post');


// リクエストメソッドがGETでURIがログアウトの時に 'Auth\LoginController@logout' を実行する
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('tasks', 'TasksController');
   

});





