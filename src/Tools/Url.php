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

    public function setUrl($url = '')
    {
        $this->url = $url;
    }

    // 合作方编号
    public function setPartnerid($partnerid)
    {
        $this->partnerid = $partnerid;
    }

    // 授权码
    public function setToken($token)
    {
        $this->token = $token;
    }

    // 接入密钥
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
        $sysParam['method'] = $method;
        unset($sysParam['partnerkey']);

        return $sysParam;
    }

    private function checkSysParam()
    {
        if (empty($this->url)) throw new \Exception('请设置请求地址',-1);
        if (empty($this->partnerid)) throw new \Exception('请设置合作方编号',-1);
        if (empty($this->token)) throw new \Exception('请设置授权码',-1);
        if (empty($this->partnerkey)) throw new \Exception('请设置接入密钥',-1);
    }

    public function getUrl($method)
    {
        $this->checkSysParam();
        return $this->url . '?' . http_build_query($this->sign($method));
    }
}