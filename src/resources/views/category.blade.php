@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="category__content">

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


<div class="category__form">
    <form class="create-form" action="/categories" method="post">
        @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text"name="name" value="{{ old('name') }}">
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
                <form id="update-form-{{ $category->id }}" action="/categories/update" method="post">
                    @method('PATCH')
                    @csrf
                    <input class="update-form__item-input" type="text" name="name" value="{{ $category->name }}">
                    <input type="hidden" name="id" value="{{ $category->id }}">
                </form>
            </td>

            <td class="category-table__item">
                <div class="button-group">
                    <button class="update-form__button-submit" type="submit" form="update-form-{{ $category->id }}">更新</button>
                    <form class="delete-form" action="/categories/delete" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <button class="delete-form__button-submit" type="submit">削除</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
