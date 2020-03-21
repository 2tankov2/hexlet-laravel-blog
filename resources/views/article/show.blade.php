@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <small>
        <a href=" {{ route('article_categories.show', ['article_category' => $article->category_id]) }} ">{{$article->category_id}}</a>
    </small>
    <div>{{$article->body}}</div>
@endsection
