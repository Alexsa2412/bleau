@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')
    <div class="row">

        <div class="col">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <i class="fas fa-house-user me-2"></i>Meu Endereço Atual
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row card-text">
                        @if($pessoa->enderecoAtual)
                            <div class="row">
                                <div class="col">
                                    <p class="fw-bold">Logradouro</p>
                                    <p>{{$pessoa->enderecoAtual->obterLogradouroCompleto()}}</P>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <p class="fw-bold">Complemento</p>
                                    <p>{{$pessoa->enderecoAtual->complemento}}</P>
                                </div>
                                <div class="col">
                                    <p class="fw-bold">Cidade/UF</p>
                                    <p>Campo Grande/MS</P>
                                </div>
                                <div class="col">
                                    <p class="fw-bold">CEP</p>
                                    <p>{{$pessoa->enderecoAtual->obterCepFormatado()}}</P>
                                </div>
                            </div>
                        @else
                            <div class="col">
                                <p class="fw-bold text-center">Nenhum endereço cadastrado</p>
                            </div>
                        @endif
                    </div>

                    <div class="row mt-3">
                        <div class="col text-end">
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-circle me-2"></i>Adicionar</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <i class="fas fa-user me-2"></i>Meus Documentos
                    </h6>
                </div>

                <div class="card-body">

                    @if($pessoa->cpf)
                    <div class="row card-text">
                        <div class="col">
                            <div class="col">
                                <div class="card text-dark bg-light mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="card-title">
                                                    <i class="far fa-address-card me-2"></i>CPF
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row card-text">
                                            <div class="col-3">
                                                <p class="fw-bold">Número</p>
                                                {{ $pessoa->cpf->numero }}
                                            </div>
                                            <div class="col-3">
                                                <p class="fw-bold">Órgão Emissor</p>
                                                {{ $pessoa->cpf->orgao_emissor }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($pessoa->rg)
                    <div class="row card-text">
                        <div class="col">
                            <div class="col">
                                <div class="card text-dark bg-light mb-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h6 class="card-title">
                                                    <i class="far fa-address-card me-2"></i>Registro Geral (RG)
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row card-text">
                                            <div class="col-3">
                                                <p class="fw-bold">Número</p>
                                                {{ $pessoa->rg->numero }}
                                            </div>
                                            <div class="col-3">
                                                <p class="fw-bold">Órgão Emissor</p>
                                                {{ $pessoa->rg->orgao_emissor }}
                                            </div>
                                            <div class="col-3">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($pessoa->passaporte)
                    <div class="row card-text">
                        <div class="col">
                            <div class="card text-dark bg-light mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="card-title">
                                                <i class="far fa-address-card me-2"></i>Passaporte
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row card-text">
                                        <div class="col-3">
                                            <p class="fw-bold">Número</p>
                                            {{ $pessoa->passaporte->numero }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($pessoa->cis)
                    <div class="row card-text">
                        <div class="col">
                            <div class="card text-dark bg-light">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="card-title">
                                                <i class="far fa-address-card me-2"></i>CIS
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row card-text">
                                        <div class="col-3">
                                            <p class="fw-bold">Número</p>
                                            {{ $pessoa->cis->numero }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row mt-3">
                        @if((!$pessoa->rg) || (!$pessoa->passaporte))
                            <div class="col text-end">
                                <a href="{{route('meus_dados.adiciona_documento')}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-circle me-2"></i>Adicionar</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection