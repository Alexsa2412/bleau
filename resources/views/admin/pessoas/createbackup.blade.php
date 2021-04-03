@extends('admin._template.hom')

@section('content')

<h2>Cadastro</h2>
</p>

    @if ($errors->any())

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>            
            @endforeach
        </ul>
    @endif

    <form action="{{ route('pessoas.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="foto" id="foto" value="{{old('email')}}"></p>

        <label for="email">Email</label><br>
        <input type="text" size="60" name="email" id="email" placeholder="Digite seu email" value="{{old('email')}}"></p>
        
        <label for="name">Nome</label><br>
        <input type="text" size="60" name="nome" id="name" placeholder="Digite seu nome" value="{{old('nome')}}"></p>
       
       
        <label for="data_nasc">Data de Nascimento</label><br>
        <input type="text" size="10" name="data_nasc" id="data_nasc" placeholder="Nascimento" value="{{old('data_nasc')}}"></p>
    
        <label for="nacionalidade">Nacionalidade</label><br>
        <input type="text" size="30" name="nacionalidade" id="nacionalidade" placeholder="Nacionalidade" value="{{old('nacionalidade')}}"></p>

        <label for="profissão">Profissão</label><br>
        <input type="text" size="30" name="profissão" id="profissão" placeholder="Profissão" value="{{old('profissão')}}"></p>

        <label for="CPF">CPF</label><br>
        <input type="text" size="10" name="CPF" id="CPF" placeholder="CPF" value="{{old('CPF')}}"></p>

        <label for="RG_NUM">Documento de Identidade</label><br>
        <input type="text" size="10" name="RG_NUM" id="RG_NUM" placeholder="Número" value="{{old('RG_NUM')}}">
        <input type="text" size="10" name="org_emiss" id="org_emiss" placeholder="Orgão emissor" value="{{old('org_emiss')}}">
        <input type="text" size="5" name="uf_org" id="uf_org" placeholder="UF Orgão" value="{{old('uf_org')}}"></p>

        <label for="passaporte">Nº Passaporte</label><br>
        <input type="text" size="10" name="passaporte" id="passaporte" placeholder="Passaporte" value="{{old('passaporte')}}"></p>

        <label for="logradouro">Logradouro</label><br>
        <input type="text" size="60" name="logradouro" id="logradouro" placeholder="Digite seu endereço" value="{{old('logradouro')}}">
        <input type="text" size="8" name="numero" id="numero" placeholder="número" value="{{old('numero')}}"></p>
        
        <label for="complemento">Complemento</label><br>
        <input type="text" size="30" name="complemento" id="complemento" placeholder="Complemento" value="{{old('complemento')}}">
        <input type="text" size="30" name="bairro" id="bairro" placeholder="Bairro" value="{{old('bairro')}}"></p>

        <label for="cidade">Cidade</label><br>
        <input type="text" size="55" name="cidade" id="cidade" placeholder="Cidade" value="{{old('cidade')}}">
        <input type="text" size="5" name="estado" id="estado" placeholder="UF" value="{{old('estado')}}"></p>

        <label for="cep">CEP</label><br>
        <input type="text" size="10" name="CEP" id="CEP" placeholder="CEP" value="{{old('CEP')}}">
        <input type="text" size="50" name="pais" id="pais" placeholder="pais" value="{{old('pais')}}"></p>

        <label for="fone1">Telefones</label><br>
        <input type="text" name="fone1" id="fone1" placeholder="Digite seu telefone1" value="{{old('fone1')}}">
        <input type="text" name="fone2" id="fone2" placeholder="Digite seu telefone2" value="{{old('fone2')}}"></p>

        <label for="situacao">Ativo</label><br>
        <input type="checkbox" name="situacao" id="situacao" value="{{old('situacao')}}"></p>

        
        
        <button class="btn btn-info" type="submit">Enviar</button>

    </form>
    
@endsection
