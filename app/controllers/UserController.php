<?php

namespace App\Controllers;

use App\Models\Profile;
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
                $_SESSION['id'] = $user->getId();
                $query = 'SELECT * FROM `profile` WHERE user_id = ?';
                $profile = Profile::getProfile($query, $user->getId());
                if (!empty($user)) {
                    if (!empty($profile)) {
                        $profile->getUserId();
                        $_SESSION['isProfileSave'] = $profile->getStatusIsProfileSave();
                        $_SESSION['userId'] = $profile->getUserId();
                    }
                    $_SESSION['auth'] = true;
                    $_SESSION['flash'] = 'Авторизация прошла успешно';
                    header('Location: /content/profile/list');
                    die;
                }
                RenderView::getRenderViewObject()->renderTemplate($arr, $user);
            } catch (\Exception $e) {
                $arr['error'] = $e->getMessage();
                RenderView::getRenderViewObject()->renderTemplate($arr);
                die;
            }
        }
        if (isset($_SESSION['auth'])) {
            header('Location: /content/profile/list');
            die;
        } else {
            RenderView::getRenderViewObject()->renderTemplate($arr);
        }
    }

    public function logOut()
    {
        session_destroy();
        header('Location: /content/profile/list');
        die;
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
                $arr['error'] = $e->getMessage();
                RenderView::getRenderViewObject()->renderTemplate($arr);
                die;
            }
        }
        RenderView::getRenderViewObject()->renderTemplate($arr);
    }

    public function deleteAccount($arr)
    {
        if (!empty($_POST)) {
            $query = 'SELECT * FROM `user` WHERE id = ?';
            try {
                $user = User::getUser($query);
                var_dump($_SESSION);
                var_dump($user);
                if (password_verify($_POST['password'], $user->getPassword())) {
                    $query = 'DELETE FROM `user` WHERE id = ?';
                    User::deleteUser($query);
                    $query = 'DELETE FROM `profile` WHERE user_id = ?';
                    Profile::deleteProfile($query);
                    session_destroy();
                    header('Location: /content/profile/list');
                    die;
                } else {
                    $_SESSION['flash'] = 'Пароль неверный';
                    header('Location: /content/profile/list');
                    die;
                }
            } catch (\Exception $e) {
                $arr['error'] = $e->getMessage();
                RenderView::getRenderViewObject()->renderTemplate($arr);
                die;
            }
        } else {
            RenderView::getRenderViewObject()->renderTemplate($arr);
        }
    }
}