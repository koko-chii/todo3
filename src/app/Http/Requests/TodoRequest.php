<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required|string|max:20',
            'category_id' => 'required|string|max:10',

        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Todoを入力してください',
            'content.string'   => 'Todoを文字列で入力してください',
            'content.max'      => 'Todoを20文字以下で入力してください',
            'category_id.required' => 'カテゴリを入力してください',
            'category.string'       => 'カテゴリを文字列で入力してください',
            'category.max'         => 'カテゴリを10文字以下で入力してください',
            'name.unique'          => 'カテゴリが既に存在しています'
        ];
        }
}
