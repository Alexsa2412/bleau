@extends('_template.meus_dados.meus_dados_base')

@section('resources_include')
    <script src="{{asset('js/meus_dados/adiciona_edita_documento.js')}}"></script>
@endsection

@section('conteudo_meusdados')

    <div class="card text-dark bg-light mb-3">
        <div class="card-header">
            <h6 class="card-title">
                <i class="far fa-address-card me-2"></i>Editar Documento
            </h6>
        </div>
        <div class="card-body">
            <div class="row card-text">
                <form action="#" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipo_documento" id="tipo_documento" aria-label="Tipo de Documento">
                                    <option value="{{$pessoaDocumento->tipo_documento}}" selected>{{$pessoaDocumento->tipo_documento_descricao}}</option>
                                </select>
                                <label for="tipo_de_documento">Tipo de Documento</label>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="numero" id="numero" placeholder="000" autocomplete="off" value="{{(old('numero', $pessoaDocumento->numero))}}">
                                <label for="numero">Número</label>
                            </div>
                        </div>
                        <div class="col-3" id="div_orgao-emissor">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="orgao_emissor" id="orgao_emissor" placeholder="SSP" autocomplete="off" value="{{(old('orgao_emissor', $pessoaDocumento->orgao_emissor))}}">
                                <label for="orgao_emissor">Órgão Emissor</label>
                            </div>
                        </div>
                        <div class="col-3" id="div_estado-id">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="estado_id" id="estado_id" aria-label="Estado Emissor">
                                    <option value="" selected>selecione o estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{$estado->id}}" {{(old('estado_id') == $estado->id || $pessoaDocumento->estado_id == $estado->id) ? "selected" : ""}}>{{$estado->sigla}}</option>
                                    @endforeach
                                </select>
                                <label for="estado_id">Estado Emissor</label>
                            </div>
                        </div>
                        <div class="col-3" id="div_data-de-emissao">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control data" name="data_de_emissao" id="data_de_emissao" placeholder="01/01/2000" autocomplete="off" value="{{(old('data_de_emissao', $pessoaDocumento->data_de_emissao))}}">
                                <label for="data_de_emissao">Data de Emissão</label>
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
