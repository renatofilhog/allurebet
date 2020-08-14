function abrirChat(){
	window.open("index.php/chat", "chatWindow","width=800,height=600");
}

function iniciarSuporte() {
	setTimeout(getChamado, 2000);
}
function getChamado() {
	$.ajax({
		'url':'index.php/ajax/getchamado',
		dataType:'json',
		success:function(json){
			resetChamados();
			if(json.chamados.length > 0){
				for(var i in json.chamados){
					if(json.chamados[i].status === "1"){
						$("#areadechamados").append("<tr class='chamado' data-id='"+json.chamados[i].id+"'><td>"+json.chamados[i].data_inicio+"</td><td>"+json.chamados[i].nome+"</td><td><strong>Em atendimento</strong></td></tr>");
					} else {
						$("#areadechamados").append("<tr class='chamado' data-status='"+json.chamados[i].status+"' data-id='"+json.chamados[i].id+"'><td>"+json.chamados[i].data_inicio+"</td><td>"+json.chamados[i].nome+"</td><td><button onclick='abrirChamado(this)'>Abrir chamado</button></td></tr>");
					}		
				}
			}
			setTimeout(getChamado, 2000);
		},
		error:function(){

			setTimeout(getChamado, 2000);
		}
	});
}

function resetChamados(){
	/* Uma da forma
	for(var q=0;q<($("#areadechamados tr").length-1);q++){
		$("#areadechamados tr:eq("+(q+1)+")").remove();
	}
	*/
	//Outra forma
	$(".chamado").remove();
}

function abrirChamado(obj){
	var id = $(obj).closest('.chamado').attr('data-id');
	var status = $(obj).closest('.chamado').attr('data-status');
	window.open("index.php/chat?id="+id, "chatWindow","width=800,height=600");
}

function keyUpChat(event, obj){
	if(event.keyCode === 13){ // tecla enter
		var msg = obj.value;
		obj.value = '';
		var dt = new Date();
		var hr = dt.getHours()+":"+dt.getMinutes();
		var nome = $('.chatarea').attr('data-nome');
		if(msg !== ""){
			//$(".chatarea").append('<div class="msgitem">'+hr+' - <strong>'+nome+':</strong> '+msg+'</div>');
			
			$.ajax({
				url:"index.php/ajax/sendmessage",
				type:'POST',
				data:{msg:msg}
			});
		}
	}
}

function updateChat(){

	$.ajax({
		url:'index.php/ajax/getmessage',
		dataType:'json',
		success:function(json){
			if(json.mensagens.length > 0){	
				for(var i in json.mensagens){
					var hr = json.mensagens[i].data_envio;
						if(json.mensagens[i].origem === "0"){
							var nome = "Suporte";		
						} else {
							var nome = $('.chatarea').attr('data-nome');
						}
					
					var msg = json.mensagens[i].mensagem;
					$(".chatarea").append('<div class="msgitem">'+hr+' - <strong>'+nome+':</strong> '+msg+'</div>');
				}
			}
			$('.chatarea').scrollTop($('.chatarea')[0].scrollHeight);

			setTimeout(updateChat,2500);
		},
		error:function(){
			alert("ERRO");

			setTimeout(updateChat,2500);
		}
	});

}