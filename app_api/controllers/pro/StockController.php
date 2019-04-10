<?php
namespace api\controllers\pro;

use api\controllers\BaseController;
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
    /**
     * 股票基本信息列表
     *
     * @return array
     */
    public function actionList()
    {
        list($page, $pageSize) = PageHelper::getPageParams();

        $total = (int)ProBasic::find()->count();

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
