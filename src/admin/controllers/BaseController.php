<?php

namespace yii2lab\geo\admin\controllers;


use yii2lab\domain\web\ActiveController as Controller;

class BaseController extends Controller
{

    public $service = 'geo.phone';
    public $formClass = 'yii2lab\geo\admin\forms\PhoneForm';
    public $titleName = 'title';
    const ACTION_CREATE = 'yii2lab\geo\admin\actions\CreateAction';
    const ACTION_UPDATE = 'yii2lab\geo\admin\actions\UpdateAction';


    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['render'] = 'index';
        $actions['create']['class'] = self::ACTION_CREATE;

        $actions['update']['class'] = self::ACTION_UPDATE;
        unset($actions['view']);
        return $actions;
    }

}
