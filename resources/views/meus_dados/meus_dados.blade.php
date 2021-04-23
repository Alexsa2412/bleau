@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')
    <div class="row">

        <div class="col">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <i class="fas fa-house-user me-2"></i>Meu Endereço
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
                            <div class="row mt-3">
                                <div class="col text-end">
                                    <a href="{{route('meus_dados.altera_endereco', $pessoa->enderecoAtual)}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit me-2"></i>Editar</a>
                                </div>
                            </div>
                        @else
                            <div class="col text-center">
                                <a class="btn btn-outline-primary" href="#"><i class="fas fa-plus-circle me-2"></i>Adicionar endereço</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <i class="far fa-address-book me-2"></i>Meus Contatos
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row card-text">
<<<<<<< HEAD
                        @if($pessoa->contatos)
=======
                        @forelse($pessoa->contatos as $contato)
>>>>>>> 27cd3def7aa7f56c89cd915f40b5c5716048ac83
                            <div class="row">
                                <div class="col">
                                    <p class="fw-bold">Dados do Contato</p>
                                    <p>
                                        {{$contato->numero}}
                                        @if($contato->ehWhatsapp)
                                        <i class="fab fa-whatsapp" style="color: #2CC64E"></i>
                                        @endif
                                        @if($contato->ehTelegram)
                                        <i class="fab fa-telegram-plane" style="color: #4EA4F6"></i>
                                        @endif
                                    </p>
                                </div>

                                @if ($pessoa->contatos->whatsapp)



                                @endif


                            </div>
                            <div class="row mt-3">
                                <div class="col text-end">
                                    <a href="{{route('meus_dados.adiciona_conta')}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit me-2"></i>Editar</a>
                                </div>
                            </div>
                        @empty
                            <div class="col text-center">
                                <a class="btn btn-outline-primary" href="{{route('meus_dados.adiciona_conta')}}"><i class="fas fa-plus-circle me-2"></i>Adicionar contato</a>
                            </div>
                        @endforelse
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
                                            <div class="col">
                                                <p class="fw-bold">Número</p>
                                                {{ $pessoa->cpf->numero }}
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
                                                    <i class="far fa-address-card me-2"></i>Registro Geral
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

                    @if((!$pessoa->rg) || (!$pessoa->passaporte) || (!$pessoa->cis) || (!$pessoa->cpf))
                    <div class="row mt-3">
                        <div class="col text-end">
                            <a href="{{route('meus_dados.adiciona_documento')}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-circle me-2"></i>Adicionar</a>
                        </div>
                    </div>
                    @endif

                    @if((!$pessoa->rg) && (!$pessoa->passaporte) && (!$pessoa->cis) && (!$pessoa->cpf))
                    <div class="row mt-3">
                        <div class="col text-center">
                            <a href="{{route('meus_dados.adiciona_documento')}}" class="btn btn-outline-primary"><i class="fas fa-plus-circle me-2"></i>Adicionar Documento</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card text-dark bg-light mb-3">
                <div class="card-header">
                    <h6 class="card-title">
                        <i class="fas fa-calculator me-2"></i>Meus Dados Bancários
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row card-text">
                        @if($pessoa->contaAtual)
                            <div class="row">
                                <div class="col">
                                    <p class="fw-bold">Banco</p>
                                    <p>{{$pessoa->contaAtual->banco->nome}}</P>
                                </div>

                                <div class="col">
                                    <p class="fw-bold">Tipo Conta</p>
                                    <p>{{$pessoa->contaAtual->tipo->nome}}</P>
                                </div>

                                <div class="col">
                                    <p class="fw-bold">Agência</p>
                                    <p>{{$pessoa->contaAtual->agencia->nome}}</P>
                                </div>
                                <div class="col">
                                    <p class="fw-bold">Número</p>
                                    <p>{{$pessoa->contaAtual->numero->nome}}</P>
                                </div>

                                <div class="col">
                                    <p class="fw-bold">Operação</p>
                                    <p>{{$pessoa->contaAtual->operacao->nome}}</P>
                                </div>
                                <div class="col">
                                    <p class="fw-bold">Chave Pix</p>
                                    <p>{{$pessoa->contaAtual->pix->nome}}</P>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col text-end">
                                    <a href="{{route('meus_dados.adiciona_conta')}}" class="btn btn-outline-primary btn-sm"><i class="fas fa-edit me-2"></i>Editar</a>
                                </div>
                            </div>
                        @else
                            <div class="col text-center">
                                <a class="btn btn-outline-primary" href="{{route('meus_dados.adiciona_conta')}}"><i class="fas fa-plus-circle me-2"></i>Adicionar Dados Bancários</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
