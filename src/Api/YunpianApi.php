<?php

namespace Yunpian\Sdk\Api;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Yunpian\Sdk\Constant\Code;
use Yunpian\Sdk\Constant\YunpianConstant;
use Yunpian\Sdk\Model\Result;
use Yunpian\Sdk\YunpianClient;
use Yunpian\Sdk\YunpianConf;

/**
 *
 * @author dzh
 * @since 1.0
 * @SuppressWarnings(PHPMD)
 */
abstract class YunpianApi implements YunpianApiResult, YunpianConstant
{

    /**
     *
     * @var YunpianClient
     */
    private $clnt;

    /**
     *
     * @var string
     */
    private $host;

    /**
     *
     * @var string
     */
    private $version;

    /**
     *
     * @var string
     */
    private $path;

    /**
     *
     * @var string
     */
    private $apikey;

    /**
     *
     * @var string
     */
    private $charset;

    /**
     *
     * @param YunpianClient $client
     */
    public function init(YunpianClient $clnt)
    {
        if (is_null($clnt)) {
            return;
        }
        $this->clnt = $clnt;
        $this->apikey = $clnt->apikey();
        $this->version = $clnt->conf(self::YP_VERSION);
        $this->charset = $clnt->conf(self::HTTP_CHARSET);
    }

    /**
     *
     * @return string
     */
    abstract public function name();

    /**
     *
     * @param YunpianClient|null $clnt
     * @return YunpianClient|YunpianApi
     */
    public function client(YunpianClient $clnt = null)
    {
        if (is_null($clnt)) {
            return $this->clnt;
        }

        $this->clnt = $clnt;
        return $this;
    }

    /**
     *
     * @param null $host
     * @return string|YunpianApi
     */
    public function host($host = null)
    {
        if (is_null($host)) {
            return $this->host;
        }

        $this->host = $host;
        return $this;
    }

    /**
     *
     * @param null $version
     * @return YunpianConf|YunpianApi
     */
    public function version($version = null)
    {
        if (is_null($version)) {
            return $this->version;
        }

        $this->version = $version;
        return $this;
    }

    /**
     *
     * @param null $path
     * @return YunpianApi | string
     */
    public function path($path = null)
    {
        if (is_null($path)) {
            return $this->path;
        }

        $this->path = $path;
        return $this;
    }

    /**
     *
     * @param null $apikey
     * @return string|YunpianApi
     */
    public function apikey($apikey = null)
    {
        if (is_null($apikey)) {
            return $this->apikey;
        }

        $this->apikey = $apikey;
        return $this;
    }

    /**
     *
     * @param null $charset
     * @return string|YunpianApi
     */
    public function charset($charset = null)
    {
        if (is_null($charset)) {
            return $this->charset;
        }

        $this->charset = $charset;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function uri(): string
    {
        return "{$this->host}/{$this->version}/{$this->name()}/{$this->path}";
    }

    /**
     *
     * @param array $param
     * @param ResultHandler|null $h
     * @param Result|null $r
     * @param array|null $headers
     * @return Result
     * @throws GuzzleException
     */
    public function post(array &$param, ResultHandler $h = null, Result $r = null, array &$headers = null)
    {
        try {
            $rsp = $this->clnt->post($this->uri(), $param, $this->charset(), $headers);
            return $this->result($rsp, $h, $r);
        } catch (Exception $e) {
            return $h->catchException($e, $r);
        }
    }

    public function result(array $rsp, ResultHandler $h = null, Result $r = null)
    {
        if (is_null($r)) {
            $r = new Result();
        }

        $code = $this->code($rsp, $this->version);
        return $code == Code::OK ? $h->succ($code, $rsp, $r) : $h->fail($code, $rsp, $r);
    }

    public function code(array &$rsp, $version = YunpianConstant::VERSION_V2)
    {
        if (is_null($rsp)) {
            return Code::OK;
        }

        $code = Code::UNKNOWN_EXCEPTION;
        if (is_null($version)) {
            $version = self::VERSION_V2;
        }
        if (isset($rsp)) {
            switch ($version) {
                case self::VERSION_V1:
                    $code = array_key_exists(self::CODE, $rsp) ? (int)$rsp[self::CODE] : Code::UNKNOWN_EXCEPTION;
                    break;
                case self::VERSION_V2:
                    $code = array_key_exists(self::CODE, $rsp) ? (int)$rsp[self::CODE] : Code::OK;
                    break;
            }
        }
        return $code;
    }

    /**
     *
     * @param array $param
     * @param array $must
     * @param Result|null $r
     * @return Result
     */
    public function verifyParam(array &$param, array &$must, Result $r = null)
    {
        if (is_null($r)) {
            $r = new Result();
        }
        if (!array_key_exists(self::APIKEY, $param)) {
            $param[self::APIKEY] = $this->apikey;
        }
        if (isset($must)) {
            foreach ($must as $p) {
                if (!array_key_exists($p, $param)) {
                    $r->code(Code::ARGUMENT_MISSING)->detail($p);
                    break;
                }
            }
        }
        return $r;
    }
}
