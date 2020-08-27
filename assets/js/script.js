$(document).ready(function(){
    $('.dateform').mask('00/00/0000');
    $('.moneyform').mask('000.000.000.000.000,00', {reverse: true});
    $('.telefone').mask('(00) 0 0000-0000');
    $('.CEP').mask('00.000-000');
    $('.CPF').mask('000.000.000-00', {reverse: true});
   







// Estados_Cidades
	$.getJSON('/assets/js/estados_cidades.json', function (data) {

    var items = [];
    var options = '<option value="">Escolha um estado</option>';    

    $.each(data, function (key, val) {
        options += '<option value="' + val.nome + '">' + val.nome + '</option>';
    });                 
    $("#estados").html(options);                
    
    $("#estados").change(function () {              
    
        var options_cidades = '';
        var str = "";                   
        
        $("#estados option:selected").each(function () {
            str += $(this).text();
        });
        
        $.each(data, function (key, val) {
            if(val.nome == str) {                           
                $.each(val.cidades, function (key_city, val_city) {
                    options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                });                         
            }
        });

        $("#cidades").html(options_cidades);
        
    }).change();        




});


function tppessoa(){
    if( $("#tppessoa").val() == "pf" ){

        $("#cnpj").attr("disabled","disabled");
        $("#cpf").removeAttr("disabled");
    }

    if( $("#tppessoa").val() == "pj" ){

        $("#cpf").attr("disabled","disabled");
        $("#cnpj").removeAttr("disabled");
    }
}