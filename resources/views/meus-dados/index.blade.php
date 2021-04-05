<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('meus-dados.index') }}" class="nav-link" title="Meus Dados">Meus Dados</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('meus-dados.index') }}" class="nav-link" title="Meus Dados">Meu Endereço</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('meus-dados.index') }}" class="nav-link" title="Meus Dados">Meus Documentos</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('meus-dados.index') }}" class="nav-link" title="Meus Dados">Alterar Minha Senha</a>
                </li>
            </ul>
        </nav>
        <div class="row">
            <div class="col">
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <span class="form-label">
                    Nome <span class="form-sublabel">Name</span>
                </span>
                <span class="form-control">{{ $pessoa->nome }}</span>
            </div>
            <div class="col-4">
                <span class="form-label">
                    CPF <span class="form-sublabel">Security Card</span>
                </span>
                <span class="form-control">{{ $pessoa->cpf }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <span class="form-label">
                    Data de Nascimento <span class="form-sublabel">Birth Date</span>
                </span>
                <span class="form-control">{{ $pessoa->data_de_nascimento }}</span>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>