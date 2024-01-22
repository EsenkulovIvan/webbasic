<?php

namespace App\Controllers;

use App\Views\RenderView;

class ProfileController
{
    public function mainList($arr)
    {
        $query = 'SELECT * FROM `user` WHERE email = ?';
        User::renderList($query);
        RenderView::getRenderViewObject()->renderTemplate($arr['template'], $arr[2]);
    }

    public function getRecord()
    {

    }

    public function questionnaire($arr)
    {
        RenderView::getRenderViewObject()->renderTemplate($arr['template'], $arr[2]);
    }
}