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

    protected function __construct()
    {
        $this->_ini();
    }

    public function setUrl($url = '')
    {
        $this->url = $url;
    }

    public function setPartnerid($partnerid)
    {
        $this->partnerid = $partnerid;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setPartnerkey($partnerkey)
    {
        $this->partnerkey = $partnerkey;
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