@extends('layouts.master')

@section('content')

    <h2>{{$post->title}}</h2>

    <div class="content">
        {{$post->content}}
    </div>

@endsection