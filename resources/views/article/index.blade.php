@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    <ul>
        @foreach ($articles as $article)
            <li>
                <a href=" {{ route('articles.show', ['id' => $article->id]) }} ">{{ $article->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
