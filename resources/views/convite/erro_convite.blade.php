@extends('_template.base')

@section('conteudo_base')
    <div class="container mt-5">
        <div class="row">
            {{$exception->getCode() . ' - ' . $exception->getMessage()}}<br>
            {{$exception->getDescription()}}
        </div>
    </div>
@endsection
