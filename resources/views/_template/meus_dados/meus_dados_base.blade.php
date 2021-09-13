@extends('_template.base_logado')
@section('conteudo_base_logado')
    <div class="row">

        @include('_template.meus_dados.meus_dados_menu')

        <div class="col">
            <div class="row">
                <div class="col">
                    @include('._template.formvalidation')
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-body">
                            <div class="row g-0">
                                <div class="col-2 text-center" style="font-size: 4rem; display: none">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="col">
                                    <p class="fs-3">{{auth()->user()->nome}}</p>
                                    <p class="fs-5 fw-light">{{auth()->user()->email}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('conteudo_meusdados')
        </div>

    </div>
@endsection
