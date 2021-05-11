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
                                    <a href="{{route('meus_dados.altera_documento', $pessoa->cpf)}}"class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
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
                                    <a href="{{route('meus_dados.altera_documento', $pessoa->rg)}}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
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
                                    <a href="{{route('meus_dados.altera_documento', $pessoa->passaporte)}}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
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
                                    <a href="{{route('meus_dados.altera_documento', $pessoa->cis)}}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
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
