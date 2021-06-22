$(document).ready(function(){

    function Display() {
        const div_estado_id = $("#div-estado_id");
        const div_cidade_id = $("#div-cidade_id");
        const div_estado = $("#div-estado");
        const div_cidade = $("#div-cidade");

        function mostra(elemento){
            elemento.css('display', 'block');
        }

        function esconde(elemento){
            elemento.css('display', 'none');
        }

        this.showBrasil = function displayBrasil(){
            mostra(div_estado_id);
            mostra(div_cidade_id);
            esconde(div_estado);
            esconde(div_cidade);
        }

        this.showNaoBrasil = function displayOutroPais(){
            esconde(div_estado_id);
            esconde(div_cidade_id);
            mostra(div_estado);
            mostra(div_cidade);
        }
    }

    function obterCidadesPorEstado(id, func){
        $.get('/api/endereco/estados/'+id+'/cidades', function(data){
            func(data);
        });
    }

    function preencherCidadesDoEstado(cidades){
        let cidade = $("#cidade_id");
        cidade.append('<option value="">selecione a cidade</option>');
        for(var i = 1; i < cidades.length; i++){
            cidade.append('<option value="'+cidades[i].id+'">'+cidades[i].nome+'</option>');
        }
    }

    let pais = $("#pais_id");
    let estado = $("#estado_id");
    let display = new Display();

    pais.val() == 1 ? display.showBrasil() : display.showNaoBrasil();

    pais.on("change", function(){
        pais.val() == 1 ? display.showBrasil() : display.showNaoBrasil();
    });

    estado.on("change", function(){
        $("#cidade_id").empty();
        obterCidadesPorEstado(estado.val(), preencherCidadesDoEstado);
    });
});
