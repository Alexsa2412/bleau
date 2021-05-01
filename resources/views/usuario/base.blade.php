@extends('_template.base')
@section('conteudo_base')
<div class="container h-100 w-100">
    <div class="row h-100 w-100">
        <div class="position-relative h-100 w-100">
            <div class="position-absolute top-50 start-50 h-50 translate-middle" style="width: 35%">
                <div class="row">
                    <div class="col p-5 border shadow-sm rounded-3">
                        @yield('conteudo_login')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
