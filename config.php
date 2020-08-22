<?php
// Definindo constante do criador do sistema
define("CRIADOR_DO_SISTEMA","Renato Filho");
// Ambiente de desenvolvimento
//define("ENVIRONMENT","development");
define("ENVIRONMENT","prodution");
// Configuração de Constantes para os casos

if (ENVIRONMENT == "development") {
	define("DBNAME","bicho");
	define("HOST","localhost");
	define("DBUSER","root");
	define("DBPASS","");
	define("BASEURL","http://projetobicho.com");
} elseif(ENVIRONMENT == "prodution"){
	define("DBNAME","bicho");
	define("HOST","mysql669.umbler.com");
	define("DBUSER","bicho");
	define("DBPASS","bicho123");
	define("BASEURL","http://alluredevelopment.co");
}
?>