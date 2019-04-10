<?php
namespace common\models\stock;

/**
 * tushare 数据 父类
 *
 * Class Base
 * @package common\models\stock
 */
class Base extends \strong\models\base\Mysql
{
    public static function getDb()
    {
        return \Yii::$app->db_tushare;
    }
}