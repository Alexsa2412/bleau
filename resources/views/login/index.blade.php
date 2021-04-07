<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" value="bs.ferreiras@gmail.com"> <br>
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" value="123">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>