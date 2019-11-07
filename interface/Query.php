<?php
/**
 * Created by PhpStorm.
 * User: huaminghui
 * Date: 2019/11/7
 * Time: 11:00 AM
 */

interface Query
{
    // 店铺查询
    public function queryShop($param = []);

    // 物流公司查询
    public function queryLogistics($param = []);

    // 分仓查询
    public function queryWarehouse($param = []);

    // 获取淘宝授权地址
    public function queryTaoAuth($param = []);
}