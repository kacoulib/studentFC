@extends('layouts.master')

@section('content')

    <h2>{{$tag->name}}</h2>
    
    <ul class="post">
    @forelse($tag->posts as $post)
        <li><a href="{{url('post', $post->id)}}">{{$post->title}}</a>
            <span class="post___published">{{$post->published_at}}</span>
        </li>
    @empty
        <li>aucun post associé à ce mot clé</li>
    @endforelse
    </ul>

@endsection