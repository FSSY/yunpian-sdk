<?php

namespace Yunpian\Sdk\Model;

/**
 *
 * @author dzh
 * @since 1.0.2
 */
class VideoFrame
{
    public $index = 1;
    public $playTimes = 1; // 播放次数
    public $attachments; // FrameDatas' array

    /**
     * @SuppressWarnings(PHPMD.ShortVariable)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     * @param null $index
     * @param false $rr
     * @return $this|int
     */
    public function index($index = null, $rr = false)
    {
        if (isset($index) || $rr) {
            $this->index = $index;
            return $this;
        }
        return $this->index;
    }

    /**
     * @SuppressWarnings(PHPMD.ShortVariable)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     * @param null $playTimes
     * @param false $rr
     * @return $this|int
     */
    public function playTimes($playTimes = null, $rr = false)
    {
        if (isset($playTimes) || $rr) {
            $this->playTimes = $playTimes;
            return $this;
        }
        return $this->playTimes;
    }

    /**
     * @SuppressWarnings(PHPMD.ShortVariable)
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     * @param null $attachments
     * @param false $rr
     * @return $this
     */
    public function attachments($attachments = null, $rr = false)
    {
        if (isset($attachments) || $rr) {
            $this->attachments = $attachments;
            return $this;
        }
        return $this->attachments;
    }
}
