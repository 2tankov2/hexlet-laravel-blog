@extends('layouts.app')

@section('content')
    @include('flash-message')
    {{ Form::model($category, ['url' => route('article_categories.store')]) }}
        @include('category.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
