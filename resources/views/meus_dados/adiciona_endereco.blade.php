@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')

<div class="card text-dark bg-light mb-3">
    <div class="card-header">
        <h6 class="card-title">
            <i class="fas fa-house-user me-2"></i>Adicionar Endereço
        </h6>
    </div>
    <div class="card-body">
        <div class="row card-text">
            <form action="#" method="post">
                @csrf
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="logradouro" autocomplete="off" value="{{(old('logradouro'))}}" autofocus>
                            <label for="logradouro">Logradouro</label>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="numero" id="numero" placeholder="numero" autocomplete="off" value="{{(old('numero'))}}">
                            <label for="numero">Número</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="bairro" id="bairro" placeholder="bairro" autocomplete="off"  value="{{(old('bairro'))}}">
                            <label for="bairro">Bairro</label>
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="complemento" id="complemento" placeholder="complemento" autocomplete="off" value="{{(old('complemento'))}}">
                            <label for="complemento">Complemento</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control cep" name="cep" id="cep" placeholder="cep" autocomplete="off" value="{{(old('cep'))}}">
                            <label for="cep">CEP</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="pais_id" id="pais_id" aria-label="Pais">
                                <option value="" selected>selecione o país</option>
                                @foreach($paises as $pais)
                                    <option value="{{$pais->id}}" {{(old('pais_id')==$pais->id) ? "selected" : ""}}>{{$pais->nome}}</option>
                                @endforeach
                            </select>
                            <label for="pais_id">País</label>
                        </div>
                    </div>

                    <!--

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="estado_id" id="estado_id" aria-label="UF">
                                <option value="" selected>selecione o estado</option>
                                @foreach($estados as $estado)
                                    <option value="{{$estado->id}}" {{(old('estado_id')==$estado->id)? "selected" : ""}}>{{$estado->sigla}}</option>
                                @endforeach
                            </select>
                            <label for="estado_id">Estado</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <select class="form-select" name="cidade_id" id="cidade_id" aria-label="Cidade">
                                <option value="" selected>selecione a cidade</option>
                                @foreach($cidades as $cidade)
                                    <option value="{{$cidade->id}}" {{(old('cidade_id')==$cidade->id) ? "selected" : ""}}>{{$cidade->nome}}</option>
                                @endforeach
                            </select>
                            <label for="cidade_id">Cidade</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="estado" id="estado" placeholder="estado" autocomplete="off" value="{{(old('estado'))}}">
                            <label for="estado">Estado</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="cidade" id="cidade" placeholder="cidade" autocomplete="off" value="{{(old('cidade'))}}">
                            <label for="cidade">Cidade</label>
                        </div>
                    </div>

                    -->



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
