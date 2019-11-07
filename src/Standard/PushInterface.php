<?php
/**
 * Created by PhpStorm.
 * User: huaminghui
 * Date: 2019/11/7
 * Time: 10:59 AM
 */
namespace Jushuitan\Standard;

interface PushInterface
{
    // 订单推送
    public function pushOrder($param);
}