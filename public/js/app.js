$("div.alert").not(".alert-important").delay(6000).fadeOut(2000);

$('.cpf').mask('000.000.000-00', {reverse: false});
$('.cpf').attr('placeholder', '___.___.___-__');

$('.cnpj').mask('00.000.000/0000-00', {reverse: false});
$('.cnpj').attr('placeholder', '___.___.___-__');

$('.telefone_com_ddd').mask('(00) 0000-0000', {reverse: false});
$('.telefone_com_ddd').attr('placeholder', '(__) ____-____');

$('.celular_com_ddd').mask('(00) 00000-0000', {reverse: false});
$('.celular_com_ddd').attr('placeholder', '(__) _____-____');

$('.data').mask('00/00/0000', {reverse: false});
$('.data').attr('placeholder', '__/__/____');

$('.hora').mask('00:00', {reverse: false});
$('.hora').attr('placeholder', '00:00');

$('.cns').mask('000 0000 0000 0000', {reverse: false});
$('.cns').attr('placeholder', '000 0000 0000 0000');

$('.cep').mask('00000-000', {reverse: false});
$('.cep').attr('placeholder', '_____-___');
