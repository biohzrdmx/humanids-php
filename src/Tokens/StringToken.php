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

class StringToken implements TokenInterface {

    /**
     * String length
     */
    protected int $length;

    /**
     * Alphabet
     */
    protected string $alphabet;

    /**
     * Constructor
     * @param int    $length   String length
     * @param string $alphabet Alphabet
     */
    public function __construct(int $length = 6, string $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') {
        if ($length <= 0) throw new InvalidArgumentException("Invalid length specified: {$length}");
        if ( empty($alphabet) ) throw new InvalidArgumentException("Invalid alphabet specified");
        $this->length = $length;
        $this->alphabet = $alphabet;
    }

    /**
     * @inheritdoc
     */
    public function random(): string {
        $ret = '';
        $size = strlen($this->alphabet) - 1;
        for ($char = 0; $char < $this->length; $char++) {
            $index = random_int(0, $size); // @phpstan-ignore-line
            $ret .= $this->alphabet[$index];
        }
        return $ret;
    }
}
