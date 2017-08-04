@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    <ul>
        @foreach($posts as $p)
            <li>
                <a href="{{ $p->url }}">{{ $p->title }}</a>
            </li>
        @endforeach
    </ul>

    {{ $posts->render() }}

@endsection
