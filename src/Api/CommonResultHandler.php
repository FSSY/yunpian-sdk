<?php

namespace Yunpian\Sdk\Api;

use Yunpian\Sdk\Constant\Code;
use Yunpian\Sdk\Constant\YunpianConstant;
use Yunpian\Sdk\Model\Result;

/**
 * Class CommonResultHandler
 * @package Yunpian\Sdk\Api
 * @SuppressWarnings(PHPMD)
 */
class CommonResultHandler implements ResultHandler
{

    private $data;

    public function __construct(callable $data)
    {
        $this->data = $data;
    }

    public function succ($code, array $rsp, $r)
    {
        if (is_null($r)) {
            $r = new Result();
        }
        return $r->code($code)->msg(
            array_key_exists(YunpianConstant::MSG, $rsp) ? $rsp[YunpianConstant::MSG] : null,
            true
        )->data(call_user_func($this->data, $rsp));
    }

    public function fail($code, array $rsp, $r)
    {
        if (is_null($r)) {
            $r = new Result();
        }
        return $r->code($code)->msg(
            array_key_exists(YunpianConstant::MSG, $rsp) ? $rsp[YunpianConstant::MSG] : null,
            true
        )->detail(
            array_key_exists(YunpianConstant::DETAIL, $rsp) ? $rsp[YunpianConstant::DETAIL] : null,
            true
        );
    }

    public function catchException($e, $r)
    {
        if (is_null($r)) {
            $r = new Result();
        }
        return $r->code(Code::UNKNOWN_EXCEPTION)->exception($e, true);
    }
}
