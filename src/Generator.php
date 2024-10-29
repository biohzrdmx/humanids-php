<?php

declare(strict_types = 1);

/**
 * Humanids
 * Human-readable identifier generation
 * @author  biohzrdmx <github.com/biohzrdmx>
 * @license MIT
 */

namespace Humanids;

use RuntimeException;

use Humanids\Tokens\TokenInterface;

class Generator {

    /**
     * Token array
     * @var array<TokenInterface>
     */
    protected array $tokens;

    /**
     * Constructor
     * @param array $tokens Token array
     */
    public function __construct(array $tokens) {
        $this->tokens = $tokens;
    }

    /**
     * Generate a random ID
     * @param  string $separator Word separator
     */
    public function generate(string $separator = '-'): string {
        $result = [];
        if (! $this->tokens ) throw new RuntimeException('Token list is empty');
        foreach ($this->tokens as $token) {
            $result[] = $token->random();
        }
        return implode($separator, $result);
    }
}
