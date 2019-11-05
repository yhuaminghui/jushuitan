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
        if (empty($this->url)) return ['error'=>-1,'msg'=>'请设置请求地址'];
        if (empty($this->partnerid)) return ['error'=>-1,'msg'=>'请设置合作方编号'];
        if (empty($this->token)) return ['error'=>-1,'msg'=>'请设置授权码'];
        if (empty($this->partnerkey)) return ['error'=>-1,'msg'=>'请设置接入密钥'];
        return ['error'=>1,'msg'=>'成功'];
    }

    public function getUrl($method)
    {
        // 验证请求参数是否正确
        $sysParam = $this->checkSysParam();
        if ($sysParam['error'] !== 1)
        {
            return ['error'=>-1,'msg'=>$sysParam['msg']];
        }

        return [
            'error'     =>  1,
            'url'       =>  $this->url . '?' . http_build_query($this->sign($method))
        ];
    }
}