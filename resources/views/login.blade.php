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
    <form action="{{route("usuario.login")}}" method="post">
        @csrf
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><br>
        <label for="password">Senha</label>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="logar">
    </form>
</body>
</html>
