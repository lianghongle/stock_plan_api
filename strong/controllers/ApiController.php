<?php
namespace strong\controllers;

use strong\helpers\ArrayHelper;
use yii\filters\Cors;

/**
 * api
 *
 * Class ApiController
 * @package strong\controllers
 */
class ApiController extends \strong\controllers\WebController
{
    public $layout = false;

    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::class,
                'cors' => [
                    'Origin' => ['*'],//定义允许来源的数组
                    'Access-Control-Request-Method' => ['GET','POST','PUT','DELETE', 'HEAD', 'OPTIONS'],//允许动作的数组
                ],
            ],
        ], parent::behaviors());
    }
}


