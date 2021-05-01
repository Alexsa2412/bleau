@extends('_template.base')
@section('conteudo_base')
    @include('_template.menu_superior')
    <div class="container">
        <div class="mt-3">
            @include('flash::message')
        </div>
        @yield('conteudo_base_logado')
    </div>
@endsection
