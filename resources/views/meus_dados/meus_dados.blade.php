@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')
    <div class="row">

        <div class="col">
            <!-- inicio meu endereço -->
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-house-user me-2"></i>Meu Endereço
                            </div>
                        </div>
                    </h6>
                </div>
                <div class="card-body fs-6 fw-light">
                    @if($pessoa->enderecoAtual)
                        <div class="row card-text">
                            <div class="row">
                                <div class="col">
                                    <p class="fw-bolder">Logradouro</p>
                                    <p>{{$pessoa->enderecoAtual->obterLogradouroCompleto()}}</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p class="fw-bolder">Complemento</p>
                                    <p>{{$pessoa->enderecoAtual->complemento}}</p>
                                </div>
                                <div class="col">
                                    <p class="fw-bolder">Cidade/UF</p>
                                    @if($pessoa->enderecoAtual->cidade)
                                    <p>{{optional($pessoa->enderecoAtual->cidade)->nome . "/" . optional(optional($pessoa->enderecoAtual->cidade)->estado)->sigla}}</p>
                                    @endif
                                </div>
                                <div class="col">
                                    <p class="fw-bolder">Pais</p>
                                    <p>{{optional($pessoa->enderecoAtual->pais)->nome}}</p>
                                </div>
                                <div class="col">
                                    <p class="fw-bolder">CEP</p>
                                    <p>{{$pessoa->enderecoAtual->obterCepFormatado()}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-end">
                                <a href="{{route('meus_dados.altera_endereco', $pessoa->enderecoAtual)}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit me-2"></i>Editar</a>
                            </div>
                        </div>
                    @else
                        <div class="col text-center">
                            <a class="btn btn-outline-primary" href="{{route('meus_dados.adiciona_endereco')}}"><i class="fas fa-plus-circle me-2"></i>Adicionar endereço</a>
                        </div>
                    @endif
                </div>
            </div>
            <!-- fim do meu endereço -->

            <!-- inicio meus contatos -->
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <div class="row">
                            <div class="col">
                                <i class="far fa-address-book me-2"></i>Meus Contatos
                            </div>
                        </div>
                    </h6>
                </div>
                <div class="card-body fs-6 fw-light">
                    <div class="row card-text">
                        <div class="col">
                        @forelse($pessoa->contatos as $contato)
                            <div class="card text-dark bg-light mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="card-title fw-bolder">
                                                @if($contato->tipo_contato === "celular")
                                                    <i class="fas fa-mobile-alt me-2"></i>Celular
                                                    @if($contato->ehWhatsapp)
                                                        <i class="fab fa-whatsapp" style="color: #2CC64E"></i>
                                                    @endif
                                                    @if($contato->ehTelegram)
                                                        <i class="fab fa-telegram-plane" style="color: #4EA4F6"></i>
                                                    @endif
                                                @endif
                                                @if($contato->tipo_contato === "residencial")
                                                        <i class="fas fa-home me-2"></i>Residencial
                                                @endif
                                                @if($contato->tipo_contato === "comercial")
                                                        <i class="fas fa-phone-square-alt me-2"></i>Comercial
                                                @endif
                                            </h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="{{route('meus_dados.altera_contato', $contato)}}" class="text-secondary"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('meus_dados.altera_contato', $contato)}}" class="text-danger"><i class="far fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row card-text">
                                        <div class="col">
                                            {{ optional($contato->pais)->codigo_de_area_formatado }} {{$contato->numero_formatado}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col text-center">
                                <a class="btn btn-outline-primary" href="{{route('meus_dados.adiciona_contato')}}"><i class="fas fa-plus-circle me-2"></i>Adicionar contato</a>
                            </div>
                        @endforelse
                        </div>
                    </div>
                    @if(!$pessoa->contatos->isEmpty())
                    <div class="row">
                        <div class="col text-end">
                            <a href="{{route('meus_dados.adiciona_contato')}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-circle me-2"></i>Adicionar</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- final do meus contatos -->

            <!-- inicio meus documentos -->
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <i class="fas fa-user me-2"></i>Meus Documentos
                    </h6>
                </div>
                <div class="card-body fs-6 fw-light">
                    @if($pessoa->cpf)
                    <div class="row card-text">
                        <div class="col">
                            <div class="card text-dark bg-light mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="card-title fw-bolder">
                                                <i class="far fa-address-card me-2"></i>CPF
                                            </h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="{{route('meus_dados.altera_documento', $pessoa->cpf)}}" class="text-secondary"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row card-text">
                                        <div class="col">
                                            <p class="fw-bolder">Número</p>
                                            <p>{{ $pessoa->cpf->numero }}</p>
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
                            <div class="card text-dark bg-light mb-3">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="card-title fw-bolder">
                                                <i class="far fa-address-card me-2"></i>Registro Geral
                                            </h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="{{route('meus_dados.altera_documento', $pessoa->rg)}}" class="text-secondary"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row card-text">
                                        <div class="col-3">
                                            <p class="fw-bolder">Número</p>
                                            <p>{{ $pessoa->rg->numero }}</p>
                                        </div>
                                        <div class="col-3">
                                            <p class="fw-bolder">Órgão Emissor</p>
                                            <p>{{ $pessoa->rg->orgao_emissor }}</p>
                                        </div>
                                        <div class="col-3">
                                            <p class="fw-bolder">UF do Órgão Emissor</p>
                                            <p>{{ $pessoa->rg->estado->sigla }}</p>
                                        </div>
                                        <div class="col-3">
                                            <p class="fw-bolder">Data de Emissão</p>
                                            <p>{{ $pessoa->rg->data_de_emissao }}</p>
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
                                        <div class="col-6">
                                            <h6 class="card-title fw-bolder">
                                                <i class="far fa-address-card me-2"></i>Passaporte
                                            </h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="{{route('meus_dados.altera_documento', $pessoa->passaporte)}}" class="text-secondary"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row card-text">
                                        <div class="col-3">
                                            <p class="fw-bolder">Número</p>
                                            <p>{{ $pessoa->passaporte->numero }}</p>
                                        </div>
                                        <div class="col">
                                            <p class="fw-bolder">Data de Emissão</p>
                                            <p>{{ $pessoa->passaporte->data_de_emissao }}</p>
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
                                <div class="card-header fw-bolder">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="card-title">
                                                <i class="far fa-address-card me-2"></i>CIS
                                            </h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="{{route('meus_dados.altera_documento', $pessoa->cis)}}" class="text-secondary"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row card-text">
                                        <div class="col-3">
                                            <p class="fw-bolder">Número</p>
                                            {{ $pessoa->cis->numero }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(((!$pessoa->rg) or (!$pessoa->passaporte) or (!$pessoa->cis) or (!$pessoa->cpf)) and (!$pessoa->documentos->isEmpty()))
                    <div class="row mt-3">
                        <div class="col text-end">
                            <a href="{{route('meus_dados.adiciona_documento')}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-circle me-2"></i>Adicionar</a>
                        </div>
                    </div>
                    @endif
                    @if($pessoa->documentos->isEmpty())
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{route('meus_dados.adiciona_documento')}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle me-2"></i>Adicionar Documento</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- final meus documentos -->

            <!-- inicio meus dados bancários -->
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <i class="fas fa-calculator me-2"></i>Meus Dados Bancários
                    </h6>
                </div>
                <div class="card-body fs-6 fw-light">
                    <div class="row card-text">
                        <div class="col">
                        @if($pessoa->contaAtual)
                            <div class="row">
                                <div class="col fw-bolder fs-5">
                                    <p>
                                        @if($pessoa->contaAtual->tipo == "corrente")
                                        <i class="fas fa-credit-card me-1"></i>
                                        @endif
                                        @if($pessoa->contaAtual->tipo == "poupanca")
                                        <i class="fas fa-piggy-bank me-1"></i>
                                        @endif
                                        {{$pessoa->contaAtual->tipo_descricao}}
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p class="fw-bolder">Banco</p>
                                    <p>{{$pessoa->contaAtual->banco->nome}}</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <p class="fw-bolder">Agência</p>
                                    <p>{{$pessoa->contaAtual->agencia}}</p>
                                </div>
                                <div class="col">
                                    <p class="fw-bolder">Número</p>
                                    <p>{{$pessoa->contaAtual->numero}}</p>
                                </div>
                                <div class="col">
                                    <p class="fw-bolder">Operação</p>
                                    <p>{{$pessoa->contaAtual->operacao}}</p>
                                </div>
                                <div class="col">
                                    <p class="fw-bolder">Chave Pix</p>
                                    <p>{{$pessoa->contaAtual->pix}}</p>
                                </div>
                            </div>
                            <div class="col text-end mt-3">
                                <a href="{{route('meus_dados.altera_conta', $pessoa->contaAtual)}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit me-2"></i>Editar</a>
                            </div>
                        @endif
                        </div>
                    </div>
                    @if(!$pessoa->contaAtual)
                    <div class="row">
                        <div class="col text-center">
                            <a class="btn btn-outline-primary" href="{{route('meus_dados.adiciona_conta')}}"><i class="fas fa-plus-circle me-2"></i>Adicionar Dados Bancários</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- final do meus dados bancários -->
        </div>
    </div>
@endsection
