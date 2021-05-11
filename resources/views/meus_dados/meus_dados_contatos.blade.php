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
                                    <a href="{{route('meus_dados.altera_contato', $contato)}}" class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toogle="modal" data-bs-target="#ModalContato{{$contato->id}}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
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

                    <div id="ModalContato{{$contato->id}}" class="modal fade" role="dialog" style="z-index: 9000" aria-labelledby="ModalContato{{$contato->id}}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Deseja excluir este contato?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Excluir</button>
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
