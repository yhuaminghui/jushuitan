<?php
/**
 * Created by PhpStorm.
 * User: huaminghui
 * Date: 2019/11/7
 * Time: 10:59 AM
 */

interface Push
{
    // 订单推送
    public function pushOrder($param);
}