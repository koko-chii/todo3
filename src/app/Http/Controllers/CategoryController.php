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
            'name' => 'required|string|max:10|unique:categories,name',
        ], [
            'name.required' => 'カテゴリを入力してください',
            'name.unique' => 'そのカテゴリ名は既に存在します',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/categories')->with('message', 'カテゴリーを作成しました');
    }

}
