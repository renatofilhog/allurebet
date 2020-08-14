<?php

class core {

	/*
	* Será usado a função para rodar o sistema.
	*/

	public function run() {
		// Irá pegar URL encontrada, separa a url em dois.
		$url = explode("index.php", $_SERVER["PHP_SELF"]);
		// Pega o que vem deppios de Index, quie é o que queremos.
		
		$url = end($url);
		
		// Setando como padrão logo de inicio para economizar memoria
		$params = array(); // Padrão.

		if (!empty($url)) {
			// Se a URL não estiver vazia, então iremos fazer algumas verificações.
			// Transofrma a URL em um ARRAY e tira o primeiro registro que é em branco
			$url = explode('/', $url);
			array_shift($url);
			//Verificação da última barra
			if(end($url) == ""){array_pop($url);}
			
			// Pegamos o controller que no caso é o primeiro do array e depois removemos para ficarmos mais limpos
			$currentController = $url[0]."Controller";
			array_shift($url);


			//IF para setar o 2 parametro (Ação)
			if(isset($url[0])){
				// Após pegado a Action, só restará um array com dados a serem enviados a controllers
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			//Se existir ainda algo mais, iremos adicionar no array @params
			if(count($url)>0){
				$params = $url;
			}

			

		} else {
			// Se tiver, por padrão ele será redirecionado ao HOMECONTROLLER
			$currentController = "homeController";
			$currentAction = "index"; // Função corrente
			
			
		}

		/*Teste:
		echo "Controller: ".$currentController;
		echo "<br>";
		echo "Action: ".$currentAction;
		echo "<br>";
		echo "Parametros: ";
		print_r($params);
		exit;
		*/

		// Importa o arquivo
		require_once "controller.php";
		// Diz que a C é equivalente ao controller atual
		$c = new $currentController();
		
		//Iremos usar uma função que faz ser enviada argumentos em forma de array
		call_user_func_array(array($c,$currentAction), $params);
		
	}
}


?>