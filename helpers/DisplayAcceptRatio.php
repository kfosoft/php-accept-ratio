<?php
namespace kfosoft\helpers;

use kfosoft\enums\StandardAcceptRatio;

/**
 * Graphics display resolution helper.
 * @package kfosoft\helpers
 * @version 1.0.1
 * @copyright (c) 2014-2015 KFOSoftware Team <kfosoftware@gmail.com>
 */
class DisplayAcceptRatio
{
    /** @var int|float|double width. */
    protected $width;

    /** @var int|float|double height. */
    protected $height;

    /**
     * AcceptRatio constructor.
     * @param int $width width.
     * @param int $height height.
     */
    public function __construct($width, $height)
    {
        $this->setWidth($width)->setHeight($height);
    }

    /**
     * Returns accept ratio.
     * @return null|string accept ratio.
     */
    public function get()
    {
        $width = $this->getWidth();
        $height = $this->getHeight();
        $resolution = "{$width}x{$height}";
        if (is_null($result = StandardAcceptRatio::getAcceptRatioByResolution($resolution))) {
            $nod = $this->getNod($width, $height);
            $width = $width / $nod;
            $height = $height / $nod;
            $result = "{$width}:{$height}";
        }

        return $result;
    }

    /**
     * @param int $width width.
     * @param int $height height.
     * @return int|float|double nod.
     */
    public function getNod($width, $height)
    {
        if ($width >= $height) {
            $one = $width;
            $two = $height;
        } else {
            $one = $height;
            $two = $width;
        }

        $remnant = $one % $two;

        if ($remnant > 0) {
            $one = $two;
            $two = $remnant;
            $nod = $this->getNod($one, $two);
        } else {
            $nod = $two;
        }

        return $nod;
    }

    /**
     * @return float|int width.
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return float|int height.
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param float|int $width width.
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @param float|int $height height.
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }
}
