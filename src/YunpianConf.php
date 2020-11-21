<?php

namespace Yunpian\Sdk;

/**
 *
 * @author dzh
 * @since 1.0
 */
class YunpianConf implements Constant\YunpianConstant
{

    /**
     *
     * @var array
     */
    private array $conf = [];

    /**
     * to upsert $conf
     *
     * @param string $apikey
     * @param array $conf
     * @return YunpianConf
     */
    public function with(string $apikey, array $conf = []): YunpianConf
    {
        if (!empty($conf)) {
            foreach ($conf as $key => $value) {
                $this->conf[$key] = $value;
            }
        }

        if (isset($apikey)) {
            $this->conf[self::YP_APIKEY] = $apikey;
        }

        return $this;
    }

    /**
     * load yunpian.ini to initialize YunpianConf firstly:
     * <p>
     *
     * </p>
     *
     * @return YunpianConf
     */
    public function init(): YunpianConf
    {
        if (is_null($this->conf)) {
            $this->conf = [];
        }

        $configs = parse_ini_file("yunpian.ini");
        foreach ($configs as $key => $value) {
            $this->conf[$key] = $value;
        }
        return $this;
    }

    /**
     *
     * @param null $key
     * @param null $defval
     * @return mixed
     */
    public function conf($key = null, $defval = null)
    {
        if (is_null($key)) {
            return $this->conf;
        }
        $val = $this->conf[$key];
        return is_null($val) ? $defval : $val;
    }

    /**
     *
     * @return string
     */
    public function apikey(): string
    {
        return $this->conf[self::YP_APIKEY];
    }
}
