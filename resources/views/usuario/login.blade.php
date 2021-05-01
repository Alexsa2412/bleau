@extends('usuario.base')
@section('conteudo_login')
    <div class="row">
        <div class="col text-center mb-4">
            <p class="fs-1"><i class="fas fa-user-circle"></i></p>
            <p class="fw-light fs-3">Fazer login</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('flash::message')
            <form action="{{route("usuario.login")}}" method="post">
                @csrf
                <div class="form-floating first mb-3">
                    <input type="text" name="email" class="form-control form-control-lg email" placeholder="email@servidor.com">
                    <label for="email">E-mail</label>
                </div>

                <div class="form-floating last mb-3">
                    <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="000">
                    <label for="password">Senha</label>
                </div>

                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-sign-in-alt me-2"></i>Efetuar Login</button>
                    </div>
                    <div class="col-6 text-end va-center fw-light pt-1">
                        <a class="link-secondary text-decoration-none align-middle" href="{{route('esqueci_minha_senha')}}">esqueci minha senha</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
