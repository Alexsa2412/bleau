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

    <form action="{{ route('pessoas.updatedados', $pessoa->id) }}" method="post">
        @csrf
        @method('put')

        <div class="row g-2">
            <div class="col-8">
                <label for="email" class="form-label">Email</label><br>
                <input type="text" name="email" id="email"  value="{{$pessoa->email}}" class="form-control email"></p>

                <label for="nome" class="form-label">Nome</label><br>
                <input type="text"  name="nome" id="name" value="{{$pessoa->nome}}" class="form-control"></p>
            </div>

            <div  class="col-4">

                <input type="file" name="foto" id="foto" value="{{old('foto')}}" >
                  
            </div>
        </div>
                         
        <div class="row g-3">
            <div class="col-4">
                <label for="data_nasc" class="form-label">Data de Nascimento</label>
                <input type="date"  name="data_nasc" id="data_nasc" value="{{$pessoa->data_nasc}}" class="form-control"></p>
            </div>

            <div class="col-4">
                <label for="nacionalidade" class="form-label">Nacionalidade</label><br>
                <input type="text" name="nacionalidade" id="nacionalidade" value="{{$pessoa->nacionalidade}}" class="form-control"></p>
            </div>

            <div class="col-4">
                <label for="profissao">Profissão</label><br>
                <input type="text" name="profissao" id="profissao"  value="{{$pessoa->profissao}}"  class="form-control"></p>
            </div>

        </div> <br> 
        
        
        <div class="row g-2">
            <div class="col-3">
                <label for="fone1" class="form-label">Telefone 1</label>
                <input type="text"  name="fone1" id="fone1" value="{{$pessoa->fone1}}" class="form-control"></p>
            </div>

            <div class="col-3">
                <label for="fone2" class="form-label">Telefone 2</label>
                <input type="text"  name="fone2" id="fone2" value="{{$pessoa->fone2}}" class="form-control"></p>
            </div>   
            
            <div class="col-6">
               
            </div> 

        </div> <br>                  
        
        <button class="btn btn-info" type="submit">Enviar</button>

    </form>
@endsection
