<?php

namespace Yunpian\Sdk\Api;

/**
 *
 * @author dzh
 * @since 1.0
 */
class VoidApi extends YunpianApi
{

    public const NAME = "void";

    public function name(): string
    {
        return self::NAME;
    }
}
