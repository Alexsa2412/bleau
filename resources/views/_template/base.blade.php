<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="{{asset('css/site.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e9969a57dd.js" crossorigin="anonymous"></script>
    <title>Bleauboard</title>
</head>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scrioll-heigth: 100px">
                        <li class="nav-item">
                            <a href="{{route('meus_dados')}}" class="nav-link active">Meus Dados</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Enviar Convite</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <a href="{{route('logout')}}" class="btn btn-outline-light btn-sm" title="Efetuar logout"><i class="fas fa-sign-out-alt me-2"></i>Sair</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="mt-3">
            @include('flash::message')
        </div>
        <div>
            @yield('conteudo_base')
        </div>
    </div>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
</body>
</html>
