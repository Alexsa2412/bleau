@extends('_template.base')

@section('conteudo_base')
    <div class="container mt-3">
        <div class="mt-3">
            @include('flash::message')
        </div>

        <div class="mt-3">
            @include('_template.formvalidation')
        </div>

        <div class="card text-dark bg-light mb-3">
            <div class="card-header">
                <h5 class="card-title">Bem-vindo ao Conselho Azul</h5>
                <p class="card-title mb-0">Vamos começar com alguns dados básicos?</p>
            </div>
            <div class="card-body">
                <div class="row card-text">
                    <form action="{{route('convite.cadastro_basico.store', $convite)}}" method="post">
                        @csrf

                        <input type="hidden" name="codigo_do_convite" value="{{$convite->codigo_do_convite}}">
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="emailConvidado" id="emailConvidado" placeholder="emailConvidado" autocomplete="off" value="{{old('emailConvidado', $convite->email_do_convidado)}}" readonly>
                                    <label for="emailConvidado">E-mail <small><em>(não pode ser alterado)</em></small></label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-8 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" autocomplete="off" value="{{old('nome', $convite->nome_do_convidado)}}" autofocus>
                                    <label for="nome">Nome</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control data" name="data_de_nascimento" id="data_de_nascimento" placeholder="01/01/2000" autocomplete="off"  value="{{(old('data_de_nascimento'))}}">
                                    <label for="data de nascimento">Data de Nascimento</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="estado_civil" id="estado_civil" aria-label="Estado Civil">
                                        <option value="">selecione o estado civil</option>
                                        <option value="solteiro" {{ old('estado_civil') == 'solteiro' ? "selected" : "" }} >Solteiro(a)</option>
                                        <option value="casado" {{ old('estado_civil') == 'casado' ? "selected" : "" }} >Casado(a)</option>
                                        <option value="separado" {{ old('estado_civil') == 'separado' ? "selected" : "" }}>Separado(a)</option>
                                        <option value="divorciado" {{ old('estado_civil') == 'divorciado' ? "selected" : "" }}>Divorciado(a)</option>
                                        <option value="viuvo" {{ old('estado_civil') == 'viuvo' ? "selected" : "" }}>Viúvo(a)</option>
                                        <option value="uniao_estavel" {{ old('estado_civil') == 'uniao_estavel' ? "selected" : "" }}>União Estável</option>
                                    </select>
                                    <label for="estado_civil">Estado Civil</label>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="profissao" id="profissao" placeholder="profissao" autocomplete="off" value="{{(old('profissao'))}}">
                                    <label for="profissao">Profissão</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="senha" id="senha" placeholder="novasenha" autocomplete="off" >
                                    <label for="senha">Nova senha</label>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" name="confirmarsenha" id="confirmarsenha" placeholder="confirmarsenha" autocomplete="off" >
                                    <label for="confirmarsenha">Confirmar nova senha</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <input class="btn btn-outline-success" type="submit" value="Começar a participar do Conselho Azul">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
