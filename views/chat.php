<?php
$c = new Chamados();
$m = new Mensagens();

$id_chamado = $_SESSION['chatwindow'];
$area = $_SESSION['area'];

$lastmsg = $c->updateLastMsg($id_chamado, $area);

//print_r($lastmsg);
?>
<div class="chatarea" data-nome="<?php echo $nome; ?>">
	<div id="msgpadrao"><strong>Mensagem Automática:</strong> Sejam bem vindo ao chat instrumental de renato filho, fofa-se seu lindo</div>
</div>
<div class="inputarea">
	<input type="text" name="msg" id="msg" onkeyup="keyUpChat(event, this)">
</div>

<script type="text/javascript">updateChat();</script>