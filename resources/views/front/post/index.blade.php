@extends('layouts.master')

@section('content')
        <h2>{{$titleCat}}</h2>
        <ul class="post">
            @forelse($posts as $post)
                <li><a class="post__title" href="{{url('post', $post->id)}}">{{$post->title}}</a>
                    <span class="post__published">{{$post->published_at}}</span>



                    @forelse($post->tags as $tag)
                        <span class="post__tag">
                        <a href="{{url('tag', $tag->id)}}">{{$tag->name}}</a>
                    </span>
                    @empty
                        <span class="post__tag">aucun mot clé</span>
                    @endforelse
                </li>
            @empty
                <li>Aucun post dans cette catégorie</li>
            @endforelse
        </ul>
@endsection