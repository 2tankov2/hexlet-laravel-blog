@extends('layouts.app')

@section('content')
    <h1>Список категорий</h1>

    @include('flash-message')
    <ul>
        @foreach ($categories as $category)
            <li>
                <a class="text-warning stretched-link font-weight-bold" href=" {{ route('article_categories.show', $category) }} ">{{ $category->name }}</a>
                <small>
                    (<a href=" {{ route('article_categories.edit', $category) }} ">редактировать</a>)
                    [<a href=" {{ route('article_categories.destroy', $category) }} " data-confirm="Вы уверены?" data-method="delete" rel="nofollow">X</a>]
                </small>
            </li>
        @endforeach
    </ul>
    <a href=" {{ route('article_categories.create') }} ">Добавить новую категорию</a>
@endsection
