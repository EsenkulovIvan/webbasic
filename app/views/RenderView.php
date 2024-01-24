<?php

namespace App\Views;

use App\Models\User;

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

    public function renderTemplate($valueForTemplate, $objects = null)
    {
        require $this->pathToTemplate . '/' . $valueForTemplate['template'] . '.php';
    }
}