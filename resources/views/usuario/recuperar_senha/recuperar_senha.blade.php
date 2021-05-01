@extends('usuario.base')

@section('conteudo_login')
    @include('flash::message')

    <div class="row mb-4">
        <div class="col text-center lh-sm fw-light">
            <p class="fs-3 fw-bolder">Recuperação de conta</p>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <p class="mb-4">
                <small>
                    informe seu e-mail para iniciar o processo de recuperação da sua conta
                </small>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{route('esqueci_minha_senha.post')}}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <div class="form-floating first">
                            <input type="text" name="email" class="form-control email" placeholder="email@servidor.com">
                            <label for="email">Digite seu E-mail</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-end">
                        <input class="btn btn-sm btn-primary fw-bold" style="font-size: .9rem" type="submit" value="Próxima">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(window).load(function() {
            $('#prizePopup').modal('show');
        });
    </script>
@endsection
