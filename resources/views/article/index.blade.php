@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>

    @include('flash-message')
    <ul>
        @foreach ($articles as $article)
            <li>
                <a class="text-warning stretched-link font-weight-bold" href=" {{ route('articles.show', ['id' => $article->id]) }} ">{{ $article->name }}</a>
                <small>
                    <a href=" {{ route('articles.edit', ['id' => $article->id]) }} ">редактировать</a>
                </small>
            </li>
        @endforeach
    </ul>
    <a href=" {{ route('articles.create') }} ">Добавить новую статью</a>
@endsection
