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
