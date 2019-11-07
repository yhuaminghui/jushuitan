<?php
/**
 * Created by PhpStorm.
 * User: huaminghui
 * Date: 2019/10/31
 * Time: 4:37 PM
 */

namespace Jushuitan;


use Jushuitan\Standard\PushInterface;
use Jushuitan\Tools\Request;
use Jushuitan\Tools\Url;

class JushuitanPush implements PushInterface
{
    use Url;
    use Request;

    // 订单推送
    public function pushOrder($param)
    {
        return $this->POST($this->getUrl('jushuitan.orders.upload'),$param);
    }

}