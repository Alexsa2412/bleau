@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')

<div class="card text-dark bg-light mb-3">
    <div class="card-header">
        <h6 class="card-title">
            <i class="fas fa-envelope-open-text me-2"></i>Convite
        </h6>
    </div>
    <div class="card-body">
        <div class="row card-text">
            <form action="{{route('convite.convidar.store')}}" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nome_do_convidado" id="nome_do_convidado" placeholder="nome_do_convidado" value="{{old('nome_do_convidado')}}" autocomplete="off" autofocus>
                            <label for="nome_do_convidado">Nome do Convidado</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="email_do_convidado" id="email_do_convidado" placeholder="email_do_convidado" autocomplete="off" value="{{old('email_do_convidado')}}">
                            <label for="email_do_convidado">Email do Convidado</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-end">
                        <a href="{{route('meus_dados')}}" class="btn btn-outline-secondary">Cancelar</a>
                        <input class="btn btn-outline-success" type="submit" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
