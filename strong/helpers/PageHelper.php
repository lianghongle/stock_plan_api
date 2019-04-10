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
 * 分页
 *
 * Class Page
 * @package strong
 */
class PageHelper
{
    public static $param_page = 'page';
    public static $param_page_size = 'page_size';
    public static $page = 1;
    public static $page_size = 10;

    /**
     * 获取分页参数
     *
     * @param string $page          请求第几页
     * @param string $page_size     分页大小
     *
     * @return array
     */
    public static function getPageParams($params = [])
    {
        $pageParam = self::$param_page;
        $pageSizeParam = self::$param_page_size;

        if(isset($params[self::$param_page]) && !empty($params[self::$param_page])){
            $pageParam = $params[self::$param_page];
        }
        if(isset($params[self::$param_page_size]) && !empty($params[self::$param_page_size])){
            $pageSizeParam = $params[self::$param_page_size];
        }

        $page = Yii::$app->request->get($pageParam, self::$page);
        self::$page = $page;

        $pageSize = Yii::$app->request->get($pageSizeParam, self::$page_size);
        self::$page_size = $pageSize;

        return [
            (int)$page,
            (int)$pageSize
        ];
    }

    /**
     * 获取返回需要的分页参数
     *
     * @param $count        数据总数
     * @param $pageSize     分页大小
     *
     * @return array
     */
    public static function getPageCount($count = 0, $pageSize = 10)
    {
        $pageSize = $pageSize ? $pageSize : self::$page_size;

        return ceil($count / $pageSize);
    }

    /**
     * get offset and limit
     *
     * @return array
     */
    public static function getOffsetAndLimit()
    {
        return [
            (int)(self::$page - 1) * self::$page_size,
            (int)self::$page_size
        ];
    }
}