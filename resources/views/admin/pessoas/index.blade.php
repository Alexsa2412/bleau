@extends('admin._template.hom')

<p>
@section('content')
    <a href="{{ route('pessoas.create') }}">Criar novo cadastro</a>
    <hr>

    @if (session('message') )
        <div>
            {{session('message') }}
        </div>
        
    @endif
    <h1>Listagem de Pessoas</h1>
    
<hr> 
    <form action="{{ route('pessoas.search')}}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Pesquisar">
        <button class="btn btn-info" type="submit">
            <i class="fas fa-search"></i> Filtrar</button>
    </form>
<hr>
    
    <table width = 100%; padding 8px; font-family: arial, sans-serif>
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Ações</td>
            
        </tr>
        

        @foreach ($pessoas as $pessoa)

        <div class="container" style="font-size: 14px">   
            <tr>
                <td>{{$pessoa->nome}}</td>
                <td>{{$pessoa->email}}</td>
                <td><a href="{{ route('pessoas.show', $pessoa->id ) }}" style="padding: 5px">
                    <i class="far fa-eye"></i></a>
                <a href="{{ route('pessoas.edit', $pessoa->id ) }}" style="padding: 5px">
                    <i class="far fa-edit"></i></a></td>
            </tr>
            
        </div>
                
        @endforeach


    </table>

    <hr>
    
    @if (isset($filters))
        {{ $pessoas->appends($filters)->links() }}
    @else
    {{ $pessoas->links()}}    
    @endif
    <style>
        .w-5{
            display: none;
        }
    </style>

@endsection