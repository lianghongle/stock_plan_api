<?php
/**
 * Created by PhpStorm.
 * User: lianghongle
 * Date: 2018/6/5
 * Time: 上午9:28
 */

namespace strong\helpers;

use Yii;

/**
 * 日期时间
 *
 * Class Page
 * @package strong
 */
class DataTimeHelper
{
    public static function range($start, $end, $step, $format = 'Y-m-d H:i:s')
    {
        //统一成时间戳
        $start = is_int($start) ? $start : strtotime($start);
        $end = is_int($end) ? $end : strtotime($end);

        return array_map(function($data) use ($format){
            return date($format, $data);
        }, range($start, $end, $step));
    }
}

var_dump(DataTimeHelper::range('2018-07-31','2018-07-31', 3600*24, 'Y-m-d'));

