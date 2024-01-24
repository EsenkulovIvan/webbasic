<?php

session_start();

spl_autoload_register(function (string $className) {
    $classNameFull = str_replace("\\", "/", mb_strtolower($className));
    preg_match('#(?<namespace>\w+/\w+)/(?<class>\w+)#', $classNameFull, $matches);
    $namespace = $matches['namespace'];
    $className = ucfirst($matches['class']);
    require __DIR__ . '/' . $namespace . '/' . $className . '.php';
});

/*$db = new \App\Connect\DataBase();
$db1 = new \App\Connect\DataBase();
$v = new \App\Views\RenderView();

var_dump($v);
var_dump($db);
var_dump($db1);*/

if (isset($_GET['params'])) {
    $routUri = $_GET['params'];
} else {
    $routUri = '';
}
//unset($_SESSION['auth']);
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


