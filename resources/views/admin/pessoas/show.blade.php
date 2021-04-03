@extends('admin._template.hom')

@section('content')
    <h3>Detalhes da Pessoa </h3>
        
    <ul>
        <li>{{ $pessoa->nome}}</li>
        <li>{{ $pessoa->email}}</li>
    </ul>

    <form action="{{ route('pessoas.destroy', $pessoa->id)}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button class="btn btn-info" type="submit">Excluir Dados</button>
    </form>
@endsection
