@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')

    <div class="card text-dark bg-light mb-3">
        <div class="card-header">
            <h6 class="card-title">
            <i class="fas fa-phone me-2"></i></i>Adicionar Contato
            </h6>
        </div>
        <div class="card-body">
            <div class="row card-text">
                <form action="#" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="pais_id" id="pais_id" aria-label="Pais" autofocus>
                                    <option value="" selected>selecione o país</option>
                                    @foreach($paises as $pais)
                                        <option value="{{$pais->id}}" {{(old('pais_id') == $pais->id) ? "selected" : ""}}>{{$pais->nome}}</option>
                                    @endforeach
                                </select>
                                <label for="pais_id">País</label>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <select class="form-select" name="tipo_contato" id="tipo_contato" aria-label="Tipo de contato">
                                    <option value="">selecione o tipo</option>
                                    <option value="residencial" {{ old('tipo_contato') == 'residencial' ? "selected" : "" }}>Residencial</option>
                                    <option value="comercial" {{ old('tipo_contato') == 'comercial' ? "selected" : "" }}>Comercial</option>
                                    <option value="celular" {{ old('tipo_contato') == 'celular' ? "selected" : "" }}>Celular</option>
                                </select>
                                <label for="tipo_contato">Tipo de Contato</label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="numero" id="numero" placeholder="000" autocomplete="off" value="{{(old('numero'))}}">
                                <label for="numero">Número</label>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="whatsapp" id="whatsapp" value="sim">
                                <label class="form-check-label" for="whatsapp">Whatsapp</label>
                              </div>

                              <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="telegram" id="telegram" value="sim">
                                <label class="form-check-label" for="telegram">Telegram</label>
                            </div>

                        </div>


                    </div>
                    <div class="row">
                        <div class="col text-end">
                            <a href="{{route('meus_dados')}}" class="btn btn-outline-secondary">Cancelar</a>
                            <input class="btn btn-outline-success" type="submit" value="Inserir">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
