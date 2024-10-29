<?php

declare(strict_types = 1);

/**
 * Humanids
 * Human-readable identifier generation
 * @author  biohzrdmx <github.com/biohzrdmx>
 * @license MIT
 */

namespace Humanids\Tokens;

interface TokenInterface {

    /**
     * Pick a random token
     */
    public function random(): string;
}
