<?php
namespace common\models\stock;

/**
 * 股票基本信息
 *
 * Class Basic
 * @package common\models\stock
 */
class Basic extends Base
{
    /**
     * 模型对应存储名称
     *
     * @return string
     */
    public static function tableName()
    {
        return '{{%basic}}';
    }
}