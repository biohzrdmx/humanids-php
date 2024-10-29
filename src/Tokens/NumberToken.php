<?php

declare(strict_types = 1);

/**
 * Humanids
 * Human-readable identifier generation
 * @author  biohzrdmx <github.com/biohzrdmx>
 * @license MIT
 */

namespace Humanids\Tokens;

use InvalidArgumentException;

class NumberToken implements TokenInterface {

    /**
     * Minimum value
     */
    protected int $min;

    /**
     * Maximum value
     */
    protected int $max;

    /**
     * Padding zeroes
     */
    protected int $padding;

    /**
     * Constructor
     * @param int $min Minimum value
     * @param int $max Maximum value
     */
    public function __construct(int $min = 2, int $max = 99, int $padding = 0) {
        if ($min < 0) throw new InvalidArgumentException("Minimum value must be greater than or equal to zero");
        if ($max <= $min) throw new InvalidArgumentException("Maximum value must be greater the the minimum value");
        $this->min = $min;
        $this->max = $max;
        $this->padding = $padding;
    }

    /**
     * @inheritdoc
     */
    public function random(): string {
        $value = (string)random_int($this->min, $this->max);
        return $this->padding ? str_pad($value, $this->padding, '0', STR_PAD_LEFT) : $value;
    }
}
