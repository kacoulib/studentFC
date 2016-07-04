@extends('layouts.master')

@section('content')
    @if(!empty($students))
        <ul>
            @foreach($students as $student)
                <li><a href="{{url('student', $student->id)}}">{{$student->name}}</a></li>
            @endforeach
        </ul>
    @else
        <p>Aucun étudiant trouvé</p>
    @endif
@endsection
