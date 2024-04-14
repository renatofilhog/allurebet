<?php
// Fica dentro da Pasta CORE (Coração de tudo)
namespace core;
class controller {
	/* Este método/ação vai carregar uma view
	* PARAM ($viewName) NOME da view a ser carregada
	* PARAM ($viewData)[array]
	*/
	public function loadView($viewName, $viewData = array()){
		// Extrai de acordo com as chaves, as variáveis com seus respectitivos valores
		extract($viewData);
		//Precisamos incluir a VIEW dentro do php, usando o INPUT
		include 'views/'.$viewName.'.php';

	}
	// Método para carregar o template nas páginas.
	// Admin
	public function loadTemplate($viewName, $viewData = array(),$titles) {
		// Extrai de acordo com as chaves, as variáveis com seus respectitivos valores
		extract($titles);
		// Incluindo o template na página
		include 'views/template_admin.php';
	}

	// Método para carregar o template nas páginas.
	// Cliente
	public function loadTemplate2($viewName, $viewData = array(),$titles) {
		// Extrai de acordo com as chaves, as variáveis com seus respectitivos valores
		extract($titles);
		// Incluindo o template na página
		include 'views/template_cliente.php';
	}
}

?>