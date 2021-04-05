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
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('meus-dados.index') }}" title="Meus Dados">Meus Dados</a>  |  
                <a href="{{ route('meus-dados.index') }}" title="Meus Dados">Alterar Minha Senha</a>  |  
                <a href="{{ route('meus-dados.index') }}" title="Meus Dados">Alterar Meu Endereço</a>  |  
                <a href="{{ route('meus-dados.index') }}" title="Meus Dados">Alterar Meus Dados de Documentos</a>
            </div>
        </div>
        <div class="row">
            <div class="col">

            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $pessoa->nome }}">
            </div>
            <div class="col-2">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{ $pessoa->CPF }}">
            </div>
            <div class="col-2">
                <label for="dataDeNascimento">Data de Nascimento</label>
                <input type="date" name="dataDeNascimento" id="dataDeNascimento" value="{{ $pessoa->data_nasc }}" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label"></label>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>