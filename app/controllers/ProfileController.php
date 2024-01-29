<?php

namespace App\Controllers;

use App\Models\Profile;
use App\Views\RenderView;

class ProfileController
{
    public function mainList($arr)
    {
        if (isset($_SESSION['auth'])) {
            if (isset($_SESSION['flash'])) {
                $arr['success'] = $_SESSION['flash'];
                unset($_SESSION['flash']);
            } else {
                $arr['success'] = '';
            }
            $query = 'SELECT * FROM `user`';
            try {
                $listUsers = Profile::renderList($query);
                RenderView::getRenderViewObject()->renderTemplate($arr, $listUsers);
            } catch (\Exception $e) {
                $arr['error'] = $e->getMessage();
                RenderView::getRenderViewObject()->renderTemplate($arr);
                die;
            }
        } else {
            header('Location: /auth/user/log');
            die;
        }
    }

    public function lookList($arr)
    {
        if (isset($_SESSION['auth'])) {
            $query = 'SELECT * FROM `profile` WHERE user_id = ?';
            try {
                $dataProfile = Profile::getProfile($query, $_SESSION['id']);
                RenderView::getRenderViewObject()->renderTemplate($arr, $dataProfile);
            } catch (\Exception $e) {
                $arr['error'] = $e->getMessage();
                RenderView::getRenderViewObject()->renderTemplate($arr);
                die;
            }
        } else {
            header('Location: /auth/user/log');
            die;
        }
    }

    public function redactorList($arr)
    {
        if (isset($_SESSION['auth'])) {
            if (empty($_POST)) {
                $query = 'SELECT * FROM `profile` WHERE user_id = ?';
                try {
                    $dataProfile = Profile::getProfile($query, $_SESSION['id']);
                    RenderView::getRenderViewObject()->renderTemplate($arr, $dataProfile);
                } catch (\Exception $e) {
                    $arr['error'] = $e->getMessage();
                    RenderView::getRenderViewObject()->renderTemplate($arr);
                    die;
                }
            } else {
                $query = 'UPDATE `profile` SET surname = ?, name = ?, job_title = ?, company = ?, education = ?, gender = ?, phone = ?, marriage = ?, about_me = ? WHERE user_id = ?';
                try {
                    Profile::redactorProfile($query, $_POST);
                    $_SESSION['flash'] = 'Профиль успешно отредактирован';
                    header('Location: /content/profile/list');
                    die;
                } catch (\Exception $e) {
                    $arr['error'] = $e->getMessage();
                    RenderView::getRenderViewObject()->renderTemplate($arr);
                    die;
                }
            }
        } else {
            header('Location: /auth/user/log');
            die;
        }
    }

    public function questionnaire($arr)
    {
        if ($_SESSION['auth']) {
            if (!empty($_POST)) {
                $query = 'INSERT INTO `profile` (surname, name, job_title, company, education, gender, phone, marriage, about_me, user_id, status_is_profile_save) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                try {
                    Profile::writeQuestionnaire($query, $_POST);
                    $query = 'SELECT * FROM `profile` WHERE user_id = ?';
                    $profile = Profile::getProfile($query, $_SESSION['id']);
                    $_SESSION['isProfileSave'] = $profile->getStatusIsProfileSave();
                    $_SESSION['userId'] = $profile->getUserId();
                    header('Location: /content/profile/list');
                    die;

                } catch (\Exception $e) {
                    $arr['error'] = 'Ошибка! ' . $e->getMessage();
                    RenderView::getRenderViewObject()->renderTemplate($arr);
                }
            } else {
                RenderView::getRenderViewObject()->renderTemplate($arr);
            }
        } else {
            header('Location: /auth/user/log');
        }
    }
}