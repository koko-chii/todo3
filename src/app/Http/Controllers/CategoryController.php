<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::all();

        return view('category', compact('categories'));

    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|max:10',
        ],[
        'name.required' => 'カテゴリ名を入力してください',
        'name.max' => 'カテゴリ名は10文字以内で入力してください',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }


    public function update(Request $request)
    {
        $request->validate([
        'name' => 'required',
        ],[
        'name.required' => 'カテゴリ名を入力してください',
        ]);

        $category = Category::find($request->id);
        $category->update([
        'name' => $request->name
        ]);

        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }

    public function destroy(Request $request)
    {

        Category::find($request->id)->delete();

        return redirect('/categories')->with('message', 'カテゴリを削除しました');
    }
}