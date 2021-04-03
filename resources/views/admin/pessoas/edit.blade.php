@extends('admin._template.hom')

@section('content')
    <h1>Editar pessoa  {{$pessoa->nome }}</h1>

    @if ($errors->any())

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>            
            @endforeach
        </ul>
    @endif

    <form action="{{ route('pessoas.update', $pessoa->id) }}" method="post">
        @csrf
        @method('put')
        <input type="text" name="nome" id="name" placeholder="Digite seu nome" value="{{ $pessoa->nome}}"> </p>
        <input type="text" name="email" id="email" placeholder="Digite seu email" value="{{$pessoa->email}}"></p>
        <input type="text" name="fone1" id="fone1" placeholder="Digite seu telefone" value="{{$pessoa->fone1}}"></p>
        <button class="btn btn-info" type="submit">Enviar</button>

    </form>
@endsection
