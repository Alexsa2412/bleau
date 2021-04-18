<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="{{asset('css/site.css')}}" rel="stylesheet">
    <title>Bleauboard</title>
</head>
<body>

    <form action="{{route("usuario.login")}}" method="post">
        @csrf
        <div class="container">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="mb-2">
                            <h3 class="text-center">Login</h3>
                            <p class="mb-2 text-center">Digite seu email e senha</p>
                        </div>

                        <div class="form-floating first mb-3">
                            <input type="text" name="email" class="form-control email" placeholder="email@servidor.com">
                            <label for="email">E-mail</label>
                        </div>

                        <div class="form-floating last mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="000">
                            <label for="password">Senha</label>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-sign-in-alt me-2"></i>Efetuar Login</button>
                            </div>
                            <div class="col-6">
                                <a class="link-secondary float-end" href="#">esqueci minha senha</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e9969a57dd.js" crossorigin="anonymous"></script>
</body>
</html>