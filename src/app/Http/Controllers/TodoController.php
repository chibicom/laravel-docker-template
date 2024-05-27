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

    public function store(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);

        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo(); 
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $todo->fill($inputs);
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        // dd($id);
        $todo = new Todo();
        $targetTodo = $todo->find($id);
        // dd($targetTodo);
        
        return view('todo.show', ['todo' => $targetTodo]);
    }
}
