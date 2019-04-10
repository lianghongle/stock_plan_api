<?php
namespace api\controllers;

use common\models\stock\Basic;
use common\models\stock\ProBasic;
use strong\helpers\PageHelper;

/**
 *
 *
 * Class StockController
 * @package api\controllers
 */
class StockController extends BaseController
{
    public function actionList()
    {
        list($page, $pageSize) = PageHelper::getPageParams();

        $total = Basic::find()->count();

        if($total){

            list($offset, $limit) = PageHelper::getOffsetAndLimit();

            $data = Basic::find()->offset($offset)->limit($limit)->asArray()->all();
        }else{
            $data = [];
        }

        return [
            'code' => 0,
            'msg' => '',
            'data' => [
                'current_page' => $page,
                'page_size' => $pageSize,
                'total_page' => $total,
                'list' => $data
            ],
        ];
    }

    public function actionProList()
    {
        list($page, $pageSize) = PageHelper::getPageParams();

        $total = ProBasic::find()->count();

        if($total){

            list($offset, $limit) = PageHelper::getOffsetAndLimit();

            $data = ProBasic::find()->offset($offset)->limit($limit)->asArray()->all();
        }else{
            $data = [];
        }

        return [
            'code' => 0,
            'msg' => '',
            'data' => [
                'current_page' => $page,
                'page_size' => $pageSize,
                'total_page' => $total,
                'list' => $data
            ],
        ];
    }
}
