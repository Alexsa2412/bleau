@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')

<div class="card text-dark bg-light mb-3">
    <div class="card-header">
        <h6 class="card-title">
            <i class="fas fa-key me-2"></i>Alterar minha senha
        </h6>
    </div>
    <div class="card-body">
        <div class="row card-text">
            <form action="{{route('usuario.alterar_senha.store')}}" method="post">
                @csrf
                @method('patch')
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="senhaatual" id="senhaatual" placeholder="senhaatual" autocomplete="off" autofocus>
                            <label for="senhaatual">Senha Atual</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="novasenha" id="novasenha" placeholder="novasenha" autocomplete="off" >
                            <label for="novasenha">Nova senha</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="confirmarsenha" id="confirmarsenha" placeholder="confirmarsenha" autocomplete="off" >
                            <label for="confirmarsenha">Confirmar nova senha</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-end">
                        <a href="{{route('meus_dados')}}" class="btn btn-outline-secondary">Cancelar</a>
                        <input class="btn btn-outline-success" type="submit" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
