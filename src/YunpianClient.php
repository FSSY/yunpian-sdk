<?php

namespace Yunpian\Sdk;

use Yunpian\Sdk\Api\ApiFactory;
use Yunpian\Sdk\Api\FlowApi;
use Yunpian\Sdk\Api\SignApi;
use Yunpian\Sdk\Api\TplApi;
use Yunpian\Sdk\Api\UserApi;
use Yunpian\Sdk\Api\VideoSmsApi;
use Yunpian\Sdk\Api\VoiceApi;
use Yunpian\Sdk\Api\YunpianApi;

/**
 *
 * @author dzh
 * @since 1.0
 * @SuppressWarnings(PHPMD)
 */
class YunpianClient implements Constant\YunpianConstant
{
    use YunpianGuzzle;

    /**
     *
     * @var ApiFactory
     */
    private $api;

    /**
     *
     * @var YunpianConf
     */
    private $conf;

    public function __construct()
    {
        $this->api = new Api\ApiFactory($this);
        $this->conf = new YunpianConf();
    }

    /**
     * Initialize/Create YunpianClient
     *
     * @param string $apikey
     * @param array $conf
     * @return \Yunpian\SDK\YunpianClient
     */
    public static function create($apikey, array $conf = [])
    {
        $clnt = new YunpianClient();
        $clnt->conf->init()->with($apikey, $conf);
        $clnt->initHttp($clnt->conf); // YunpianGuzzle->initHttp
        return $clnt;
    }

    /**
     *
     * @param string $name
     * @return YunpianApi
     */
    private function api($name)
    {
        return $this->api->api($name);
    }

    /**
     *
     * @return VideoSmsApi
     */
    public function vsms()
    {
        return $this->api(Api\VideoSmsApi::NAME);
    }

    /**
     *
     * @return UserApi
     */
    public function user()
    {
        return $this->api(Api\UserApi::NAME);
    }

    /**
     *
     * @return VoiceApi
     */
    public function voice()
    {
        return $this->api(Api\VoiceApi::NAME);
    }

    /**
     *
     * @return SignApi
     */
    public function sign()
    {
        return $this->api(Api\SignApi::NAME);
    }

    /**
     *
     * @return TplApi
     */
    public function tpl()
    {
        return $this->api(Api\TplApi::NAME);
    }

    /**
     *
     * @return FlowApi
     */
    public function flow()
    {
        return $this->api(Api\FlowApi::NAME);
    }

    public function conf($key = null)
    {
        return is_null($key) ? $this->conf : $this->conf->conf($key);
    }

    public function __destruct()
    {
    }

    public function __toString()
    {
        return "YunpianClient-{$this->apikey()}";
    }

    public function apikey()
    {
        return $this->conf->apikey();
    }
}
