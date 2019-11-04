<?php
/**
 * Created by PhpStorm.
 * User: huaminghui
 * Date: 2019/10/31
 * Time: 6:30 PM
 */

namespace Jushuitan;


trait Url
{
    private $url;
    private $partnerid;
    private $token;
    private $partnerkey;

    public function __construct()
    {
        $this->_ini();
    }

    private function _ini()
    {
        $config = include_once '../config.php';

        if ($config['is_test'] === true)
        {
            if ($config['is_https'] === true)
            {
                $this->url = $config['sand_url_s'];
            }else{
                $this->url = $config['sand_url'];
            }
        }else{
            if ($config['is_https'] === true)
            {
                $this->url = $config['formal_url_s'];
            }else{
                $this->url = $config['formal_url'];
            }
        }

        $this->partnerid = $config['partnerid'];
        $this->partnerkey = $config['partnerkey'];
        $this->token = $config['token'];
    }

    private function getSysParam()
    {
        $sysParam = [
            'partnerid'     => $this->partnerid,
            'partnerkey'    => $this->partnerkey,
            'token'         => $this->token,
            'ts'            => time(),
            'sign'          =>  ''
        ];
        return $sysParam;
    }

    //  MD5(method +partnerid + (key1+value1+key2+value2+……) +partnerkey)
    private function sign($method)
    {
        $sysParam = $this->getSysParam();
        $signStr = $method . $sysParam['partnerid'] . 'token' . $sysParam['token'] . 'ts' . $sysParam['ts'] . $sysParam['partnerkey'];
        $sysParam['sign'] = md5($signStr);
        return $sysParam;
    }

    public function getUrl($method)
    {
        return $this->url . '?' . implode($this->sign($method),'&');
    }
}