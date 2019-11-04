<?php
/**
 * Created by PhpStorm.
 * User: huaminghui
 * Date: 2019/10/31
 * Time: 6:11 PM
 */

namespace Jushuitan;


class BaseJushuitan
{

    // 初始化 参数
    protected function __construct()
    {

    }



    protected function POST($url, $data)
    {
        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                return false;
            }
            curl_close($ch);
            return json_decode($result,true);
        } catch(Exception $e) {
            return null;
        }

    }

}