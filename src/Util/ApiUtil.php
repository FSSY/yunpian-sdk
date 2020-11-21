<?php

namespace Yunpian\Sdk\Util;

class ApiUtil
{

    /**
     *
     * @param array $text
     * @param string $sepr
     * @return string
     */
    public static function urlEncodeAndLink(array $text, string $sepr = ',')
    {
        if (empty($text)) {
            return '';
        }

        $count = count($text);
        $res = urlencode($text[0]);
        for ($i = 1; $i < $count; $i++) {
            $res .= $sepr . urlencode($text[$i]);
        }
        return $res;
    }
}
