<?php
declare(strict_types=1);

namespace Linio\Component\Input\Constraint;

class StringSize extends Constraint
{
    /**
     * @var int
     */
    protected $minSize;

    /**
     * @var int
     */
    protected $maxSize;

    public function __construct(int $minSize, int $maxSize = PHP_INT_MAX)
    {
        $this->minSize = $minSize;
        $this->maxSize = $maxSize;
        $this->errorMessage = sprintf('Content out of min/max limit sizes [%s, %s]', $this->minSize, $this->maxSize);
    }

    public function validate($content): bool
    {
        $size = strlen($content);

        return $size >= $this->minSize && $size <= $this->maxSize;
    }
}
