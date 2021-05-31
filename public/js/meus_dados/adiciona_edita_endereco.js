
$(document).ready(function(){
    function Display() {
        let div_estado_id = $("#div-estado_id");
        let div_cidade_id = $("#div-cidade_id");
        let div_estado = $("#div-estado");
        let div_cidade = $("#div-cidade");

        function show(component){
            component.css('display', 'block');
        }

        function hide(component){
            component.css('display', 'none');
        }

        this.showBrasil = function displayBrasil(){
            show(div_estado_id)
            show(div_cidade_id);
            hide(div_estado);
            hide(div_cidade);
        }

        this.showNaoBrasil = function displayOutroPais(){
            hide(div_estado_id)
            hide(div_cidade_id);
            show(div_estado);
            show(div_cidade);
        }
    };

    function obterCidadesPorEstado(id){
        $get(url, function(data, status){
            console.log(status);
            return data;
        });
    };

    function preencherCidadesDoEstado(cidades){

    }

    let pais = $("#pais_id");
    let estado = $("#estado_id");
    let cidade = $("#cidade_id");
    let display = new Display();

    pais.val() == 1 ? display.showBrasil() : display.showNaoBrasil();

    pais.on("change", function(){
        pais.val() == 1 ? display.showBrasil() : display.showNaoBrasil();
    });

    estado.on("change", function(){
        let estado_id = estado.val();

    });
});
