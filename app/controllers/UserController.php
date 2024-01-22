<?php

namespace App\Controllers;

use App\Models\User;
use App\Views\RenderView;

class UserController
{
    public function logIn($arr)
    {
        if (!empty($_POST)) {
            try {
                $query = 'SELECT * FROM `user` WHERE email = ?';
                $user = User::readDataBase($query, $_POST);
                header('Location: content/profile/list');
                die;
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        RenderView::getRenderViewObject()->renderTemplate($arr['template'], $arr['render'], $user);

        //header('Location:' . $_SERVER['DOCUMENT_ROOT'] . '/content/profile/list');
    }
    public function register($arr)
    {
        if (!empty($_POST)) {
            try {
                $success = User::writeDataBase('INSERT INTO `user` (email, password, nickname) VALUES (?, ?, ?)', $_POST);
                if ($success) {
                    header('Location: /auth/user/log');
                    die;
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
        RenderView::getRenderViewObject()->renderTemplate($arr['template'], $arr[2]);
    }

}