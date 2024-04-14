<?php
namespace core;
use controllers;
class core {
    public function run() {
        // Obtém a URL atual
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = trim($url, '/'); // Remove barras no início e no fim

        // Separa os componentes da URL
        $urlParts = explode('/', $url);

        // Obtém o nome do controller
        $controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) . 'Controller' : 'HomeController';
        array_shift($urlParts); // Remove o primeiro item (controller)

        // Obtém a ação (método) a ser executada no controller
        $actionName = !empty($urlParts[0]) ? $urlParts[0] : 'index';
        array_shift($urlParts); // Remove o segundo item (action)

        // Parâmetros restantes da URL
        $params = $urlParts;

        // Verifica se o controller existe
        $controllerClassName = "controllers\\$controllerName";
        if (!class_exists($controllerClassName)) {
            die("Controller '$controllerClassName' not found");
        }

        // Cria uma instância do controller
        $controller = new $controllerClassName();

        // Verifica se a ação existe no controller
        if (!method_exists($controller, $actionName)) {
            die("Action '$actionName' not found in controller '$controllerName'");
        }

        // Chama a ação no controller passando os parâmetros
        call_user_func_array([$controller, $actionName], $params);
    }

}
