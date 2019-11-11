<?php
/**
 * Created by PhpStorm.
 * User: huaminghui
 * Date: 2019/10/31
 * Time: 4:37 PM
 */

namespace Jushuitan;


use Jushuitan\Standard\QueryInterface;
use Jushuitan\Tools\Request;
use Jushuitan\Tools\Url;

class JushuitanQuery implements QueryInterface
{
    use Url;
    use Request;

    // 店铺查询
    public function queryShop($param = [])
    {
        return $this->POST($this->getUrl('shops.query'),$param);
    }

    // 物流公司查询
    public function queryLogisticsCompany($param = [])
    {
        return $this->POST($this->getUrl('logisticscompany.query'),$param);
    }

    // 分仓查询
    public function queryWarehouse($param = [])
    {
        return $this->POST($this->getUrl('wms.partner.query'),$param);
    }

    // 获取淘宝授权地址
    public function queryTaoAuth($param = [])
    {
        return $this->POST($this->getUrl('auth.shop.generate.query'),$param);
    }

    // 物流公司查询
    public function queryLogistics($param = [])
    {
        return $this->POST($this->getUrl('logistic.query'),$param);
    }

    // 查询订单
    public function queryOrder($param = [])
    {
        return $this->POST($this->getUrl('orders.single.query'),$param);
    }

    // 销售出库查询
    public function queryOrderOutSimple($param = [])
    {
        return $this->POST($this->getUrl('orders.out.simple.query'),$param);
    }

    // 库存查询
    public function queryInventory($param = [])
    {
        return $this->POST($this->getUrl('inventory.query'),$param);
    }
}