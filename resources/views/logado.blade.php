<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(auth()->check())
        logado: {{auth()->user()->nome}}<br>
        <a href="{{route('logout')}}">sair</a>
    @else
        não logado
    @endif
</body>
</html>
