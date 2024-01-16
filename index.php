<?php

session_start();

spl_autoload_register(function ($className)
{
    $classNameFull = str_replace("\\", "/", mb_strtolower($className));
    preg_match('#(?<namespace>\w+/\w+)/(?<class>\w+)#',$classNameFull, $matches);
    $namespace = $matches['namespace'];
    $className = ucfirst($matches['class']);
    require __DIR__ . '/' . $namespace . '/' . $className . '.php';
});

$user = new App\Models\User();