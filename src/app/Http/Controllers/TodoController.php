<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        // データベースから全てのTodoを取得
        $todos = Todo::all();

        // resources/views/todos/index.blade.php にデータを渡す
        return view('index', compact('todos'));
    }

    public function update(TodoRequest $request)
    {
        // バリデーション（空送信チェック）
        $request->validate(['content' => 'required']);

        // 指定したIDのTodoを取得して更新
        $todo = Todo::find($request->id);
        if ($todo) {
            $todo->update(['content' => $request->content]);
        }

        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        $todo = Todo::find($request->id);
        if ($todo) {
            $todo->delete();
        }

        return redirect('/')->with('message', 'Todoを削除しました');
    }

    public function store(TodoRequest $request) {

        // ② データベースに保存する処理を追加！
        // これがないとリストに表示されません
        Todo::create(['content' => $request->content]);


        return redirect('/')->with('message', 'Todoを作成しました');
    }

}

