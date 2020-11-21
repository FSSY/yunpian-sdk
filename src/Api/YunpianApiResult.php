<?php

namespace Yunpian\Sdk\Api;

use Yunpian\Sdk\Model\Result;

/**
 * Interface YunpianApiResult
 * @package Yunpian\Sdk\Api
 * @SuppressWarnings(PHPMD)
 */
interface YunpianApiResult
{

    /**
     *
     * @param array $rsp
     * @param ResultHandler $h
     * @param Result $r
     * @return Result
     */
    public function result(array $rsp, ResultHandler $h, Result $r);

    /**
     * acquire response code
     *
     * @param array $rsp
     * @param string $version
     * @return number
     */
    public function code(array &$rsp, $version);
}
