<?php
session_start();
// Importando uma única vez o arquivo de configuração.
require "config.php";

spl_autoload_register(function ($class){
	if(strpos($class, 'Controller') > -1) { // Se achar controller no nome da class, então entra
		if (file_exists('controllers/'.$class.".php")) {
			require_once('controllers/'.$class.".php");
		}
	} else if (file_exists('models/'.$class.'.php')) { // Se nao for controller vai ver se existe algum obj na pasta models, se sim:
		require_once('models/'.$class.'.php');
	} else { //Caso nao ache obj nas duas outras, então, é na core
		require_once('core/'.$class.'.php');
	}
});

//Depois que fizemos a importação do autoload, estamos pronto para instanciar o fundamento do sistema.


$core = new core();
$core->run();


?>