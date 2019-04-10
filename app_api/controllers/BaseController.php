<?php
namespace api\controllers;

use Yii;

/**
 * 控制器 基类
 *
 * Site controller
 */
class BaseController extends \strong\controllers\ApiController
{


    public function actionIndex()
    {
        return [
            'code' => 0,
            'msg' => 'base/index',
            'data' => []
        ];
    }

    public function actionError()
    {
        return [
            'code' => 0,
            'msg' => 'base/error',
            'data' => []
        ];
    }
}
