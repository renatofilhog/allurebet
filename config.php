<?php
// Definindo constante do criador do sistema
define("CRIADOR_DO_SISTEMA","Renato Filho");
// Ambiente de desenvolvimento
define("ENVIRONMENT","development");
// Configuração de Constantes para os casos

if (ENVIRONMENT == "development") {
	define("DBNAME","chat");
	define("HOST","localhost");
	define("DBUSER","root");
	define("DBPASS","");
	define("BASEURL","http://chat.com");
}
?>