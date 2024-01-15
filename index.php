<?php

session_start();

spl_autoload_register(function ($className)
{
    require __DIR__ . '/' . str_replace("\\", "/", $className);
});