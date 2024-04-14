<?php
// Definir a função de autoload
spl_autoload_register(function ($className) {
    $classPath = __DIR__ . '/'; // Diretório raiz do projeto

    // Substituir namespace por caminho de diretório
    $classPath .= str_replace('\\', '/', $className) . '.php';

    // Verificar se o arquivo da classe existe e incluir
    if (file_exists($classPath)) {
        include_once $classPath;
    }
});
