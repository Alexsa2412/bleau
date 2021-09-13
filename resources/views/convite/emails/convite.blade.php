@extends('_template.email.base_email')
@section('conteudo')
    <p>
        Caro(a) Sr(a) <b>{{$convite->nome_do_convidado}}</b>, você foi convidado(a) por
        <b>{{$convite->pessoa->nome}}</b>, a se tornar membro do Conselho Azul.<br>
    </p>
    <p>
        Clique no botão abaixo para efetivar sua participação.
    </p>
    <p style="text-align: center; width: 100%; padding-top: 30px;">
        <a href="{{$urlDeAceite}}"
           style="border-radius: 5px; padding: 10px 15px 10px 15px; cursor: pointer;
            background-color: DodgerBlue; color:white; border-style:none; text-decoration: none">
            Quero participar
        </a>
    </p>
@endsection
