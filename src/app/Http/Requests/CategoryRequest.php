<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
        'category_id' => 'required|string|max:10|unique:categories',
        ];
    }

    public function message()
    {
        return [
        'category_id.required' => 'カテゴリを入力してください',
        'category.string'      => 'カテゴリを文字列で入力してください',
        'category.max'         => 'カテゴリを10文字以下で入力してください',
        'name.unique'          => 'カテゴリが既に存在しています'
        ];
    }

}
