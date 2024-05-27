<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    // public function index()
    // {
    //     dd('Hello World!');
    // }

    public function index()
    {
        $todo = new Todo();
        $todoList = $todo->all();
        // dd($todoList);
        
        return view('todo.index', ['todoList' => $todoList]);
    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');
        // TODO: 第1引数を指定
        return view('/todo/create'); // 追記
    }
}
