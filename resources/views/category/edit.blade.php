@extends('layouts.app')

@section('content')
    @include('flash-message')
    {{ Form::model($category, ['url' => route('article_categories.update', $category), 'method' => 'PATCH']) }}
        @include('category.form')
    {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
