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
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteContatoModal{{$contato->id}}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteContatoModal{{$contato->id}}" tabindex="-1" aria-labelledby="deleteContatoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteContatoModal{{$contato->id}}">
                                                        Excluir Contato
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Deseja excluir o contato  de número <span class="fw-bold">{{$contato->numeroFormatado}}</span>?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{route('meus_dados.exclui_contato.delete', $contato)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                                            <i class="far fa-trash-alt me-2"></i>Excluir contato
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row card-text">
                                <div class="col">
                                    {{ optional($contato->pais)->codigo_de_area_formatado }} {{$contato->numeroFormatado}}
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
