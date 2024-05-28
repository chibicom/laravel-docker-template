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

    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        // $todo = new Todo();
        // $todoList = $todo->all();
        // // dd($todoList);
        
        // return view('todo.index', ['todoList' => $todoList]);

        $todoList = $this->todo->all();

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

        // // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        // $todo = new Todo(); 
        // // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        // $todo->fill($inputs);
        $this->todo->fill($inputs);
        // // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        // $todo->save();
        $this->todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        // // dd($id);
        // $todo = new Todo();
        // $targetTodo = $todo->find($id);
        // // dd($targetTodo);

        // return view('todo.show', ['todo' => $targetTodo]);

        $todo = $this->todo->find($id);
    
        return view('todo.show', ['todo' => $todo]);
    }

        // TODO: ルートパラメータを引数に受け取る
    public function edit($id)
    {
        // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
        // dd($todo);
    }
}
