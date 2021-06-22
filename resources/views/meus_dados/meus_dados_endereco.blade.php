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
                        @else
                            <p>{{$pessoa->enderecoAtual->cidade_exterior . "/" . $pessoa->enderecoAtual->estado_exterior}}</p>
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
