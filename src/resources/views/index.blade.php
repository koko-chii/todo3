@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
@if (session('message'))
    <div class="todo__alert">
        {{ session('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="todo__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="todo__content">
    <div class="todo__form">
        <h2 class="todo__form-ttl">新規作成</h2>
        <form class="create-form" action="/" method="post">
            @csrf
            <div class="create-form__item">
                <input class="create-form__item-input" type="text"name="content">
                <select class="create-form__item-select" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="create-form__button">
                <button class="create-form__button-submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <div class="todo__form">
        <h2 class="todo__form-ttl">Todo検索</h2>
        <form class="search-form" action="/search" method="get">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
                <select class="search-form__item-select" name="category_id">
                    <option value="">カテゴリ</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="todo__table">
                <table class="todo-table__inner">
                    <tr class="todo-table__row">
                        <th class="todo-table__header">Todo</th>
                        <th class="todo-table__header">カテゴリ</th>
                    </tr>

                    @foreach ($todos as $todo)
                    <tr class="todo-table__row">
                        <td class="todo-table__item">
                            <form class="update-form" action="/update" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="update-form__item">
                                    <input class="update-form__item-input" type="text" name="content" value="{{ $todo->content }}">
                                    <input type="hidden" name="id" value="{{ $todo->id }}">
                                </div>
                                <div class="update-form__button">
                                    <button class="update-form__button-submit" type="submit">更新</button>
                                </div>
                            </form>
                        </td>

                        <td class="todo-table__item">
                            <p class="todo-table__category">{{ $todo->category->name }}</p>
                        </td>

                        <td class="todo-table__item">
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
        </form>
    </div>
</div>
@endsection
