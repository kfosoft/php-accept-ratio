<?php
namespace KFOSOFT\Domain\Display\Value;

use KFOSOFT\Domain\Display\Enumeration\StandardAcceptRatio;

/**
 * Graphics display resolution helper.
 */
class DisplayAcceptRatio
{
    /**
     * @var int width
     */
    protected int $width;

    /**
     * @var int height
     */
    protected int $height;

    /**
     * DisplayAcceptRatio constructor.
     * @param int $width
     * @param int $height
     */
    private function __construct(int $width, int $height)
    {
        $this->width  = $width;
        $this->height = $height;
    }

    /**
     * @return string
     */
    public function __invoke()
    {
        return $this->calculateRatio();
    }

    /**
     * @param int $width
     * @param int $height
     * @return static
     */
    public static function create(int $width, int $height): self
    {
        return new self($width, $height);
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Returns accept ratio.
     * @return string accept ratio.
     */
    public function calculateRatio(): string
    {
        $ratio = StandardAcceptRatio::getAcceptRatioByResolution(sprintf('%sx%s', $this->width, $this->height));

        if (null !== $ratio) {
            return $ratio;
        }

        $nod = $this->getNod($this->width, $this->height);

        return sprintf('%s:%s', $this->width / $nod,  $this->height / $nod);
    }

    /**
     * @param int $width
     * @param int $height
     * @return int
     */
    public function getNod(int $width, int $height): int
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
}
