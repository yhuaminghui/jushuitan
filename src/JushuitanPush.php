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
    public function pushOrder($param = [])
    {
        return $this->POST($this->getUrl('jushuitan.orders.upload'),$param);
    }

    // 订单取消
    public function cancelOrder($param = [])
    {
        return $this->POST($this->getUrl('jushuitan.orders.cancel'),$param);
    }

    // 订单发货 此接口数据依赖销售出库单
    public function sendOrder($param = [])
    {
        return $this->POST($this->getUrl('orders.wms.sent.upload'),$param);
    }

    // 订单分仓
    public function wmsOrder($param = [])
    {
        return $this->POST($this->getUrl('orders.modifywms.upload'),$param);
    }
}