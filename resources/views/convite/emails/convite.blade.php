<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Convite</title>
</head>
<body style="background-color: #F0F8FF; font-family: Arial, Helvetica, sans-serif">
    <h1 style="font-family: Arial, Helvetica, sans-serif; font-size: .8em; text-align: center">Convite</h1>
    <div style="border-radius: 5px; border: 2px solid #D7E1FF; padding:20px">
        Caro(a) Sr(a) <b>{{$convite->nome_do_convidado}}</b>, você foi convidado(a) por
        <b>{{$convite->pessoa->nome}}</b>, a se tornar membro do Conselho Azul.<br>
        Clique no botão abaixo para efetivar sua participação.
         </p>
        <div style="text-align: center; width: 100%">
            <a href="{{$urlDeAceite}}" onMouseOver="this.style.backgroundColor='#0070DF'" onMouseOut="this.style.backgroundColor='#1E90FF'"
                style="border-radius: 5px; padding: 10px 15px 10px 15px; cursor: pointer;
                background-color: DodgerBlue; color:white; border-style:none; text-decoration: none; font-weight: bold">
                Quero participar
            </a>
        </div>
    </div>
</body>
</html>
