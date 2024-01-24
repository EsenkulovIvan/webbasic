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
            $listUsers = Profile::renderList($query);
            RenderView::getRenderViewObject()->renderTemplate($arr, $listUsers);
        } else {
            header('Location: /auth/user/log');
            die;
        }
    }

    public function deletePfofile()
    {
        $query = 'DELETE FROM `user`';
    }

    public function questionnaire($arr)
    {
        if ($_SESSION['auth']) {
            if (!empty($_POST)) {
                try {
                    $success = Profile::writeQuestionnaire('INSERT INTO `profile` (surname, name, job_title, company, education, gender, phone, marriage, about_me, user_id, status_is_profile_save) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $_POST);
                    if ($success) {
                        $query = 'SELECT * FROM `profile` WHERE user_id = ?';
                        $profile = Profile::getProfile($query);
                        $_SESSION['isProfileSave'] = $profile->getStatusIsProfileSave();
                        $_SESSION['userId'] = $profile->getUserId();
                        header('Location: /content/profile/list');
                        die;
                    }
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            } else {
                RenderView::getRenderViewObject()->renderTemplate($arr);
            }
        } else {
            header('Location: /auth/user/log');
        }
    }
}