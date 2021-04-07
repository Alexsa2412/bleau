@extends('admin._template.hom')

@section('content')
<link rel="stylesheet" type="../css" href="estilo.css">
<h2>Cadastro</h2>
</p>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>            
            @endforeach
        </ul>
    @endif

    
    <div class="col-9">
        <div class="row">
            <form action="{{ route('pessoas.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row g-2">
                    <div class="col-6">
                        <label for="email">Email</label><br>
                        <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control email"></p>
                    </div>
                    <div class="col-6">
                        <label for="nome">Nome</label><br>
                        <input type="text" name="nome" id="name" value="{{old('nome')}}" class="form-control"></p>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-4">
                        <label for="data_nasc" class="form-label">Data de Nascimento</label>
                        <input type="date" name="data_nasc" id="data_nasc" value="{{old('data_nasc')}}" class="form-control"></p>
                    </div>
                    <div class="col-4">
                        <label for="nacionalidade" class="form-label">Nacionalidade</label><br>
                        <input type="text" name="nacionalidade" id="nacionalidade" value="{{old('nacionalidade')}}" class="form-control"></p>
                    </div>
                    <div class="col-4">
                        <label for="profissao">Profissão</label><br>
                        <input type="text" name="profissao" id="profissao"  value="{{old('profissao')}}"  class="form-control"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <button class="btn btn-info" type="submit">Enviar</button>
                    </div>
                </div>                    
            </form>         
        </div>
    </div>
@endsection
