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
        Category::create($request->only(['name']));

        return redirect('/categories')->with('message', 'カテゴリーを作成しました');
    }

}
