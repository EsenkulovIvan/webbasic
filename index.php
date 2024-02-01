<?php

session_start();

spl_autoload_register(function (string $className) {
    $classNameFull = str_replace("\\", "/", strtolower($className));
    preg_match('#(?<namespace>\w+/\w+)/(?<class>\w+)#', $classNameFull, $matches);
    $namespace = $matches['namespace'];
    $className = ucfirst($matches['class']);
    require __DIR__ . '/' . $namespace . '/' . $className . '.php';
});

$routUri = $_GET['params'];

$routs = require_once 'app/config/routs.php';

foreach ($routs as $rout => $arrayData) {
    preg_match($rout, $routUri, $matches);
    if (!empty($matches)) {
        $arrayParams = [];
        foreach ($matches as $key => $value) {
            if (!is_numeric($key)) {
                $arrayParams[$key] = $value;
            }
        }
        $controllerName = new $arrayData['controller'];
        $controllerName->{$arrayData['method']}($arrayParams);
        break;
    }
}

if (empty($matches)) {
    echo 'Страница не найдена';
}


