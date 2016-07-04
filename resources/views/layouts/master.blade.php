<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>App Student</title>
</head>
<body>
<header>
    <nav>
        <a href="{{url('/')}}">Home</a>
        <a href="{{url('student')}}">Programers</a>
    </nav>
</header>
<div class="container">
    @yield('content')
</div>
</body>
</html>