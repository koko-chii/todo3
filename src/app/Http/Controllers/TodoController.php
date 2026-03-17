<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        $todos = Todo::with('category')->get(); // Todoを取得
        $categories = Category::all();          // 2. カテゴリの全データを取得する

        return view('index', compact('todos', 'categories'));
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
        Todo::create(['content' => $request->content,
        'category_id' => $request->category_id
        ]);


        return redirect('/')->with('message', 'Todoを作成しました');
    }

}

