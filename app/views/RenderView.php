<?php

namespace App\Views;

class RenderView
{
    private static $view;
    private $pathToTemplate = __DIR__ . '/../templates/';

    private function __construction()
    {
       // $this->pathToTemplate = __DIR__ . '/../templates/';
    }
    public static function getRenderViewObject()
    {
        if (self::$view === null) {
            self::$view = new RenderView();
        }
        return self::$view;
    }

    public function renderTemplate($template, $valueForTemplate)
    {
        require $this->pathToTemplate . '/' . $template . '.php';
    }
}