@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')

<div class="card text-dark bg-light mb-3">
    <div class="card-header">
        <h6 class="card-title">
            <i class="fas fa-calculator me-2"></i>Editar dados bancários
        </h6>
    </div>
    <div class="card-body">
        <div class="row card-text">
            <form action="#" method="post">
                @csrf


                <div class="row mt-3">

                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="banco_id" id="banco_id" aria-label="Banco">
                                <option value="" selected>selecione o banco</option>
                                @foreach($bancos as $banco)
                                    <option value="banco_id" {{(old('banco_id')==$banco->id)}}>{{$banco->nome}}</option>
                                @endforeach
                            </select>
                            <label for="banco_id">Banco</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="tipo" id="tipo" aria-label="tipo" autofocus>
                                <option value="">selecione o tipo da conta</option>
                                <option value="corrente" {{ old('corrente') == 'corrente' ? "selected" : "" }}>Conta corrente</option>
                                <option value="poupanca" {{ old('poupanca') == 'poupanca' ? "selected" : "" }}>Poupança</option>
                            </select>
                            <label for="tipo">Tipo Conta</label>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="agencia" id="agencia" placeholder="agencia" autocomplete="off" value="{{(old('agencia' , $conta->agencia))}}">
                            <label for="agencia">Agência</label>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="numero" id="numero" placeholder="numero" autocomplete="off" value="{{(old('numero' , $conta->numero))}}">
                            <label for="numero">Número</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="operacao" id="operacao" placeholder="operacao" autocomplete="off" value="{{(old('operacao' , $conta->operacao))}}">
                            <label for="operacao">Operação</label>
                        </div>
                    </div>

                    <div class="col-5">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="pix" id="pix" placeholder="pix" autocomplete="off" value="{{(old('pix' , $conta->pix))}}">
                            <label for="pix">Chave PIX</label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col text-end">
                        <a href="#" class="btn btn-outline-secondary">Cancelar</a>
                        <input class="btn btn-outline-success" type="submit" value="Salvar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
