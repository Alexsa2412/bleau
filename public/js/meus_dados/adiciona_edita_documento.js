$(document).ready(function(){
    const tipoDocumento = $("#tipo_documento");

    function Display(){
        const orgaoEmissor = $("#div_orgao-emissor");
        const estadoId = $("#div_estado-id");
        const dataDeEmissao = $("#div_data-de-emissao");

        this.adicionaMascara = function(elemento, documento){
            if (documento == 'cpf') {
                elemento.mask('000.000.000-00', {reverse: false});
                elemento.attr('placeholder', '___.___.___-__');
            } else {
                elemento.unmask();
                elemento.attr('placeholder', '000');
            }
        }

        this.mostraComplemento = function(documento){
            function mostra(elemento){
                elemento.css("display", "block");
            }

            function esconde(elemento){
                elemento.css("display", "none");
            }

            if(documento == 'rg'){
                mostra(orgaoEmissor);
                mostra(estadoId);
                mostra(dataDeEmissao);
            } else {
                esconde(orgaoEmissor);
                esconde(estadoId);
                esconde(dataDeEmissao);
            }
        }
    }

    let _display = new Display();

    _display.mostraComplemento(tipoDocumento.val() == 'rg');
    _display.adicionaMascara($("#numero"), tipoDocumento.val());

    tipoDocumento.on("change", function(){
        _display.mostraComplemento(tipoDocumento.val());
        _display.adicionaMascara($("#numero"), tipoDocumento.val());
    });
});
