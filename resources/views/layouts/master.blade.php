<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>App Student</title>
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
</head>
<body>
<header>
    <nav>
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('student')}}">Programers</a>
        @forelse($categories as $id => $title)
            <a href="{{url('category', $id)}}">{{$title}}</a>
        @empty
        @endforelse
    </nav>
</header>
<div class="container">
    @yield('content')
</div>
</body>
</html>