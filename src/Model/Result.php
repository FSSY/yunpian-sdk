<?php

namespace Yunpian\Sdk\Model;

use Exception;
use Yunpian\Sdk\Constant\Code;

/**
 * Result of HttpClient Response
 *
 * @author dzh
 * @since 1.0
 * @SuppressWarnings(PHPMD.ShortVariable)
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 */
class Result
{
    private ?int $code = Code::OK;
    private ?string $msg;
    private ?string $detail;
    private ?Exception $exception;

    /**
     * json
     *
     * @var mixed
     */
    private $data;

    public function __toString(): string
    {
        return "{$this->code}-{$this->msg}-{$this->detail}";
    }

    public function isSucc(): bool
    {
        return $this->code == Code::OK;
    }

    /**
     *
     * @param null $code
     * @param boolean $rr
     * @return number|Result
     */
    public function code($code = null, $rr = false)
    {
        if (isset($code) || $rr) {
            $this->code = $code;
            return $this;
        }
        return $this->code;
    }

    /**
     *
     * @param null $msg
     * @param boolean $rr
     *            force to return $this
     * @return string|Result
     */
    public function msg($msg = null, $rr = false)
    {
        if (isset($msg) || $rr) {
            $this->msg = $msg;
            return $this;
        }
        return $this->msg;
    }

    /**
     *
     * @param null $detail
     * @param boolean $rr
     *            force to return $this
     * @return string|Result
     */
    public function detail($detail = null, $rr = false)
    {
        if (isset($detail) || $rr) {
            $this->detail = $detail;
            return $this;
        }
        return $this->detail;
    }

    /**
     *
     * @param null $e
     * @param boolean $rr
     * @return Exception|Result
     */
    public function exception($e = null, $rr = false)
    {
        if (isset($e) || $rr) {
            $this->exception = $e;
            return $this;
        }
        return $this->exception;
    }

    /**
     *
     * @param null $data
     * @param boolean $rr
     * @return array|Result
     */
    public function data($data = null, $rr = false)
    {
        if (isset($data) || $rr) {
            $this->data = $data;
            return $this;
        }
        return $this->data;
    }
}
