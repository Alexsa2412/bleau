@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')

    <div class="card text-dark bg-light mb-3">
        <div class="card-header">
            <h6 class="card-title">
                <i class="far fa-address-card me-2"></i>Adicionar Documento
            </h6>
        </div>
        <div class="card-body">
            <div class="row card-text">
                <form action="{{route('meus_dados.adiciona_documento')}}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipo_documento" id="tipo_documento" aria-label="Tipo de documento" autofocus>
                                    <option value="">selecione o tipo do documento</option>
                                    <option value="rg">Registro Geral</option>
                                    <option value="cpf">CPF</option>
                                    <option value="passaporte">Passaporte</option>
                                    <option value="cis">CIS</option>
                                </select>
                                <label for="tipo_documento">Tipo de Documento</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="numero" id="numero" placeholder="000" autocomplete="off">
                                <label for="numero">Número</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="orgao_emissor" id="orgao_emissor" placeholder="SSP" autocomplete="off">
                                <label for="orgao">Órgão Emissor</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="estado_id" id="estado_id" aria-label="Estado Emissor">
                                    <option value="" selected>selecione o estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->sigla}}</option>
                                    @endforeach
                                </select>
                                <label for="estado_id">Estado Emissor</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="data_de_emissao" id="data_de_emissao" placeholder="01/01/2000" autocomplete="off">
                                <label for="data_de_emissao">Data de Emissão</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <input class="btn btn-outline-success btn-sm" type="submit" value="Inserir">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
