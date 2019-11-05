<?php
/**
 * Created by PhpStorm.
 * User: huaminghui
 * Date: 2019/10/31
 * Time: 4:37 PM
 */

namespace Jushuitan;


class JushuitanPush extends BaseJushuitan
{
    use Url;

    public function __construct()
    {
        parent::__construct();
    }

    // 订单推送
    public function pushOrder($param)
    {
        return $this->POST($this->getUrl('jushuitan.orders.upload'),$param);
    }

}