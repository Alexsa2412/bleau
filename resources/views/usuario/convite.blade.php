@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')

<div class="card text-dark bg-light mb-3">
    <div class="card-header">
        <h6 class="card-title">
            <i class="fas fa-key me-2"></i>Convite
        </h6>
    </div>
    <div class="card-body">
        <div class="row card-text">
            <form action="#" method="post">
                @csrf
                @method('patch')
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" autocomplete="off" autofocus>
                            <label for="nome">Anfitrião</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nomeconvidado" id="nomeconvidado" placeholder="nomeconvidado" autocomplete="off" >
                            <label for="nomeconvidado">Nome do Convidado</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="emailconvidado" id="emailconvidado" placeholder="email do convidado" autocomplete="off" >
                            <label for="emailconvidado">Email do Convidado</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-end">
                        <a href="#" class="btn btn-outline-secondary">Cancelar</a>
                        <input class="btn btn-outline-success" type="submit" value="Enviar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
