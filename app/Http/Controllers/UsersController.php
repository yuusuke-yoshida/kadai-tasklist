<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加


class UsersController extends Controller
{
   
    
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
         //dump('ここに本当にきてる？');
         //exit();
        $user = User::find($id);
         $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'tasks' => $tasks,
        ];

        $data += $this->counts($user);

        // 'users.show' はルート名ではない!
        // 'users.show' はViewの場所
        // resoucesの下にview関連のファイルが存在する
        // Viewファイルは resources/views の下にある前提！
        // . は何？ 
        // ディレクトリ = フォルダ
        // usersディレクトリの下にあるshow.blade.phpファイル
        return view('users.show', $data);
            
    }


}

