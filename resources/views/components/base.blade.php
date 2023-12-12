<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>{{$title}}</title>
</head>
<body>
<header>
    <nav>
        @guest
            <a href="{{ route('login') }}">Войти</a>
        @endguest
        @auth
            <a href="{{ route('logout') }}">Выйти</a>

            @if(auth()->user()->role->title === 'admin')
                <a href="тут ссылка на создание новой записи">тут ссылка на создание новой записи</a>
                <a href="тут ссылка на просмотр всех записей">тут ссылка на все записи</a>
            @else
                <a href="тут ссылка на просмотр всех записей пользоветеля">Мои автостойки</a>
            @endif
        @endauth
    </nav>
</header>
{{ $slot }}
</body>
</html>
