@extends('layouts.master')

@section('content')

    <h2>{{$titleCat}}</h2>
    <ul>
        @forelse($posts as $post)
            <li><a href="{{url('post', $post->id)}}">{{$post->title}}</a>
                <br>{{$post->published_at}}
            </li>
        @empty
            <li>Aucun post dans cette catégorie</li>
        @endforelse
    </ul>
@endsection