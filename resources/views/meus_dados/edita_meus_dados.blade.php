@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')

<div class="card text-dark bg-light mb-3">
    <div class="card-header">
        <h6 class="card-title">
            <i class="far fa-address-card me-2"></i>Editar meus Dados
        </h6>
    </div>
    <div class="card-body">
        <div class="row card-text">
            <form action="{{route('meus_dados.altera.store', $pessoa)}}" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" autocomplete="off" value="{{(old('nome', $pessoa->nome))}}" autofocus>
                            <label for="nome">Nome</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="data_de_nascimento" id="data_de_nascimento" placeholder="01/01/2000" autocomplete="off"  value="{{(old('data_de_nascimento', $pessoa->data_de_nascimento))}}">
                            <label for="data de nascimento">Data de Nascimento</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="estado_civil" id="estado_civil" aria-label="Estado Civil">
                                <option value="">selecione o estado civil</option>
                                <option value="solteiro" {{ old('estado_civil', $pessoa->estado_civil) == 'solteiro' ? "selected" : "" }} >Solteiro(a)</option>
                                <option value="casado" {{ old('estado_civil', $pessoa->estado_civil) == 'casado' ? "selected" : "" }} >Casado(a)</option>
                                <option value="separado" {{ old('estado_civil', $pessoa->estado_civil) == 'separado' ? "selected" : "" }}>Separado(a)</option>
                                <option value="divorciado" {{ old('estado_civil', $pessoa->estado_civil) == 'divorciado' ? "selected" : "" }}>Divorciado(a)</option>
                                <option value="viuvo" {{ old('estado_civil', $pessoa->estado_civil) == 'viuvo' ? "selected" : "" }}>Viúvo(a)</option>
                                <option value="uniao_estavel" {{ old('estado_civil', $pessoa->estado_civil) == 'uniao_estavel' ? "selected" : "" }}>União Estável</option>
                            </select>
                            <label for="estado_civil">Estado Civil</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="profissao" id="profissao" placeholder="profissao" autocomplete="off" value="{{(old('profissao', $pessoa->profissao))}}">
                            <label for="profissao">Profissão</label>
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
