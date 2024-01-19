<?php

namespace App\Controllers;

use App\Models\User;
use App\Views\RenderView;

class UserController
{
    public function logIn($arr)
    {
        RenderView::getRenderViewObject()->renderTemplate($arr['template'], $arr[2]);
       /* $view = RenderView::renderTemplate();
        $user = new User();
        $query = 'SELECT * FROM `user` WHERE email = ?';
        $user->readDataBase($query);*/
    }
    public function register($arr)
    {
        RenderView::getRenderViewObject()->renderTemplate($arr['template'], $arr[2]);
        /*$view = RenderView::renderTemplate();
        $user = new User();
        $query = 'INSERT INTO `user` (email, password, nickname) VALUES (?, ?, ?)';
        $user->writeDataBase($query);*/

    }

}