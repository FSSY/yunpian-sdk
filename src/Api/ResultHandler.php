<?php

namespace Yunpian\Sdk\Api;

use Yunpian\Sdk\Model\Result;

/**
 * Interface ResultHandler
 * @package Yunpian\Sdk\Api
 * @SuppressWarnings(PHPMD)
 */
interface ResultHandler
{

    /**
     * Invoked if code is 0
     *
     * @param int $code
     * @param array $rsp
     * @param Result $r
     * @return Result
     */
    public function succ($code, array $rsp, $r);

    /**
     * Invoked if code is not 0
     *
     * @param $code
     * @param array $rsp
     * @param Result $r
     */
    public function fail($code, array $rsp, $r);

    /**
     *
     * @param \Exception $e
     * @param Result $r
     */
    public function catchException($e, $r);
}
