<?php
namespace common\models\stock;

/**
 * tushare pro 数据 父类
 *
 * Class Base
 * @package common\models\stock
 */
class BasePro extends \strong\models\base\Mysql
{
    public static function getDb()
    {
        return \Yii::$app->db_tushare_pro;
    }
}