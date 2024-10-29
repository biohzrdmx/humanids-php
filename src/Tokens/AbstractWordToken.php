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

abstract class AbstractWordToken implements TokenInterface {

    /**
     * Word array
     * @var array<string>
     */
    protected array $words = [];

    /**
     * Constructor
     * @param array $words Word array
     */
    public function __construct(array $words = []) {
        if ($words) {
            $this->words = $words;
        }
    }

    /**
     * @inheritdoc
     */
    public function random(): string {
        $index = random_int(0, count($this->words) - 1); // @phpstan-ignore-line
        return $this->words[$index];
    }
}
