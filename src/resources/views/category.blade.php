@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
@if (session('message'))
    <div class="category__alert">
        {{ session('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="category__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="category__content">
    <div class="category__form">
        <form class="create-form" action="/" method="post">
            @csrf
            <div class="create-form__item">
                <input class="create-form__item-input" type="text"name="content">
            </div>

            <div class="create-form__button">
                <button class="create-form__button-submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <div class="category__table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="category-table__header">category</th>
            </tr>
            @foreach ($categories as $category)
            <tr class="category-table__row">
                <td class="category-table__item">
                    <form class="update-form" action="/update" method="post">
                        @method('PATCH')
                        @csrf
                        <div class="update-form__item">
                            <input class="update-form__item-input" type="text" name="name" value="{{ $todo->content }}">
                            <input type="hidden" name="id" value="{{ $todo->id }}">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>

                <td class="category-table__item">
                    <p class="category-table__category">{{ $todo->category->name }}</p>
                </td>

                <td class="category-table__item">
                    <form class="delete-form" action="/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $todo->id }}">
                        <div class="delete-form__button">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
