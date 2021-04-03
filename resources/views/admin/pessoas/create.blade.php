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
                    <div class="col-8">
                        <label for="email">Email</label><br>
                        <input type="text" name="email" id="email"  value="{{old('email')}}" class="form-control email"></p>
        
                        <label for="nome">Nome</label><br>
                        <input type="text"  name="nome" id="name" value="{{old('nome')}}" class="form-control"></p>
                    </div>
    
                    <div  class="col-4">

                        <input type="file" name="foto" id="foto" value="{{old('foto')}}" >
                          
                    </div>
                </div>
                                 
                <div class="row g-3">
                    <div class="col-4">
                        <label for="data_nasc" class="form-label">Data de Nascimento</label>
                        <input type="date"  name="data_nasc" id="data_nasc" value="{{old('data_nasc')}}" class="form-control"></p>
                    </div>

                    <div class="col-4">
                        <label for="nacionalidade" class="form-label">Nacionalidade</label><br>
                        <input type="text" name="nacionalidade" id="nacionalidade" value="{{old('nacionalidade')}}" class="form-control"></p>
                    </div>

                    <div class="col-4">
                        <label for="profissao">Profissão</label><br>
                        <input type="text" name="profissao" id="profissao"  value="{{old('profissao')}}"  class="form-control"></p>
                    </div>

                </div> <br> 
                
                
                <div class="row g-2">
                    <div class="col-3">
                        <label for="fone1" class="form-label">Telefone 1</label>
                        <input type="text"  name="fone1" id="fone1" value="{{old('fone1')}}" class="form-control"></p>
                    </div>

                    <div class="col-3">
                        <label for="fone2" class="form-label">Telefone 2</label>
                        <input type="text"  name="fone2" id="fone2" value="{{old('fone2')}}" class="form-control"></p>
                    </div>   
                    
                    <div class="col-6">
                       
                    </div> 

                </div> <br>                  
                

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-1" role="presentation" ">
                        <button class="nav-link active" id="endereco-tab" data-bs-toggle="tab" data-bs-target="#endereco" type="button" aria-controls="endereco" aria-selected="true" >Endereço</button>
                    </li>

                    <li class="nav-item p-1" role="presentation">
                        <button class="nav-link" id="documento-tab" data-bs-toggle="tab" data-bs-target="#documento" type="button" aria-controls="documento" aria-selected="false">Documentos</button>
                    </li>

                    <li class="nav-item p-1" role="presentation">
                        <button class="nav-link" id="banco-tab" data-bs-toggle="tab" data-bs-target="#banco" type="button" aria-controls="banco" aria-selected="false">Dados Bancários</button>
                    </li>
                </ul><br>

    
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="endereco" role="tabpanel" aria-labelledby="endereco-tab" >
                        <div class="row g-2">
                            <div class="col-9">
                                <label for="logradouro" class="form-label">Logradouro</label><br>
                                <input type="text" name="logradouro" id="logradouro" value="{{old('logradouro')}}" class="form-control">
                            </div>
    
                            <div class="col">
                                <label for="numero" class="form-label">Número</label><br>
                                <input type="text" name="numero" id="numero" value="{{old('numero')}}" class="form-control"></p>
                            </div>
                            
                        </div>

                        <div class="row g-2">
                            <div class="col-6">
                                <label for="complemento" class="form-label">Complemento</label><br>
                                <input type="text"  name="complemento" id="complemento"  value="{{old('complemento')}}" class="form-control">
                            </div>
    
                            <div class="col">
                                <label for="bairro" class="form-label">Bairro</label><br>
                                <input type="text"  name="bairro" id="bairro"  value="{{old('bairro')}}"class="form-control"></p>
                            </div>                            
                        </div>
                        
                        <div class="row g-3">
                            <div class="col-7">
                                <label for="cidade" class="form-label">Cidade</label><br>
                                <input type="text"  name="cidade" id="cidade" value="{{old('cidade')}}" class="form-control">
                            </div>
    
                            <div class="col-2">
                                <label for="estado" class="form-label">UF</label><br>
                                <input type="text"  name="estado" id="estado"  value="{{old('estado')}}" class="form-control UF">
                            </div> 
                            
                            <div class="col-3">
                                <label for="cep" class="form-label">CEP</label><br>
                                <input type="text" name="CEP" id="CEP" value="{{old('CEP')}}" class="form-control"></p>
                            </div>   
                        </div>  

                        <div class="row g-2">
                                                      
                            <div class="col-7">
                                <label for="pais" class="form-label">País</label><br>
                                <input type="text" name="pais" id="pais" value="{{old('pais')}}" class="form-control"></p>
                            </div>   
                        </div>
                        
                        
                    </div>   
                    
                    <div class="tab-pane fade show" id="documento" role="tabpanel" aria-labelledby="documento-tab">
                        <div class="row g-3">
                            <div class="col-4">
                                <label for="RG_NUM" class="form-label">Documento de Identificação</label><br>
                                <input type="text" name="RG_NUM" id="RG_NUM" value="{{old('RG_NUM')}}" class="form-control">
                            </div>
    
                            <div class="col-4">
                                <label for="org_emiss" class="form-label">Orgão Emissor</label><br>
                                <input type="text" name="org_emiss" id="org_emiss" value="{{old('org_emiss')}}" class="form-control"></p>
                            </div>

                            <div class="col-4">
                                <label for="uf_org" class="form-label">UF Orgão Emissor</label><br>
                                <input type="text" name="uf_org" id="uf_org" value="{{old('uf_org')}}" class="form-control"></p>
                            </div>                                                        
                        </div>

                        <div class="row g-2">
                            <div class="col-6">
                                <label for="cpf" class="form-label">CPF</label><br>
                                <input type="text" name="cpf" id="cpf"  value="{{old('cpf')}}" class="form-control">
                            </div>
    
                            <div class="col">
                                <label for="passaporte" class="form-label">Passaporte</label><br>
                                <input type="text" name="passaporte" id="passaporte"  value="{{old('passaporte')}}"class="form-control"></p>
                            </div>                            
                        </div> 

                    
                    
                        
                    </div>
                    
                    <div class="tab-pane fade show" id="banco" role="tabpanel" aria-labelledby="banco-tab">
                        <div class="row g-2">                                
                            <div class="col">
                                <label for="banco" class="form-label">Nome Banco</label><br>
                                <select name="banco" id="banco" class="custom-select" value="{{old('banco')}}">
                                    <option value="Banco do Brasil">Banco do Brasil</option>
                                    <option value="Bradesco S.A.">Banco Bradesco</option>
                                    <option value="Caixa Econômica Federal" selected>Caixa Econômica Federal</option>                                    
                                    <option value="Banco Banestes S.A.">Banco Banestes</option>
                                    <option value="Banco BS2 S.A.">Banco BS2</option>

                                    
                                    
                                </select ></p>
                            </div>                                                                                  
                        </div>

                        <div class="row g-3">

                            <div class="col-2">
                                <label for="agencia" class="form-label">Agência</label><br>
                                <input type="text" name="agencia" id="agencia" value="{{old('agencia')}}" class="form-control"></p>
                            </div>  

                            <div class="col-4">
                                <label for="conta_corrente" class="form-label">Conta Corrente</label><br>
                                <input type="text" name="conta_corrente" id="conta_corrente"  value="{{old('conta_corrente')}}" class="form-control">
                            </div>
                            
                            <div class="col-6">
                                <label for="tipo_conta" class="form-label">Tipo da Conta</label><br>                               
                                    <select name="tipo_conta" id="tipo_conta" class="custom-select" value="{{old('tipo_conta')}}">
                                        <option value="Conta Corrente" selected>Conta Corrente</option>
                                        <option value="Poupanca">Poupança</option>
                                    </select >
                                                                       
  
                            </div>                              
                             
                        </div> 

                        <div class="row g-2">

                            <div class="col-3">
                                <label for="tipo_operacao" class="form-label">Número Operação</label><br>
                                <input type="text" name="tipo_operacao" id="tipo_operacao" value="{{old('tipo_operacao')}}" class="form-control"></p>
                            </div>  

                            <div class="col-9">
                                <label for="pix" class="form-label">Chave PIX</label><br>
                                <input type="text" name="pix" id="pix"  value="{{old('pix')}}" class="form-control">
                            </div>                
                            
                        </div> 
                        
                    </div> 
                </div>   
                
                
                <div class="row g-3">
                    <div class="col-3">
                        <button class="btn btn-info" type="submit">Enviar</button>
                    </div>
                    
                </div>                    
    
            </form>         
 
        </div>

    </div>

    <div class="col">

    </div>     
   
    
    
@endsection
