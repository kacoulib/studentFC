@extends('layouts.master')

@section('content')
    @if(!empty($student))
        <ul>
            <li>Nom: {{$student->name}},
                grade: {{$student->grade}}</li>
            <li>adresse: {{$student->address}}</li>
            <li>bio: {{$student->bio}}</li>
        </ul>
    @else
        <p>Désolé pas de contenu</p>
    @endif
@endsection