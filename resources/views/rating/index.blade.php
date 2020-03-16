
@extends('layouts.app')

@section('content')
    <table>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->name }}</td>
                <td>{{ $article->likes_count }}</td>
            </tr>
        @endforeach
    </table>
@endsection
