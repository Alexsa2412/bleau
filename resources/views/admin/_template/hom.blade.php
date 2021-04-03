<html lang="{{ config('app.locale')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- HTML5Shiv -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/estilo.css')}}">


    <title>Teste de título</title>
</head>

<body >

    <div class="text-center b">
        <h1>Título cabeçalho</h1>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <nav class="navbar bg-light">
                    <!-- Links -->
                    <ul class="navbar-nav ">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pessoas.index')}}">Meu Cadastro</a>
                        <nav class="navbar bg-light">
                          <ul class="navbar-nav">
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('pessoas.editdados',)}}">Dados</a>
                              <a class="nav-link" href="{{ route('pessoas.index')}}">Endereço</a>
                              <a class="nav-link" href="{{ route('pessoas.index')}}">Documento</a>
                              <a class="nav-link" href="{{ route('pessoas.index')}}">Dados Bancários</a>
                            </li>

                          </ul>
                        </nav>  
                                         
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="#">Link 2</a>
                      </li>
                      
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link 3</a>
                      </li>
                    </ul>
                  
                </nav>

                



            </div>
            <div class='content col-sm-10' >
                @yield('content') 
            </div>
        </div>

    </div>

    
    
    
</body>
</html>