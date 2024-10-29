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

class FixedToken implements TokenInterface {

    /**
     * Value
     */
    protected string $value;

    /**
     * Constructor
     * @param string $value Value
     */
    public function __construct(string $value) {
        if ( empty($value) ) throw new InvalidArgumentException("Invalid value specified");
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function random(): string {
        return $this->value;
    }
}
