@extends('layouts.app')

@section('content')
    <h1>{{$category->name}}</h1>
    <div>{{$category->description}}</div>
    <div>{{$category->state}}</div>
@endsection
