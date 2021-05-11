@extends('_template.meus_dados.meus_dados_base')

@section('conteudo_meusdados')
    <div class="row">

        <div class="col">
            @include('meus_dados.meus_dados_endereco')
            @include('meus_dados.meus_dados_contatos')
            @include('meus_dados.meus_dados_documentos')
            @include('meus_dados.meus_dados_bancarios')
        </div>
    </div>
@endsection
