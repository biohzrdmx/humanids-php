<?php

declare(strict_types = 1);

/**
 * Humanids
 * Human-readable identifier generation
 * @author  biohzrdmx <github.com/biohzrdmx>
 * @license MIT
 */

namespace Jason\Tests;

use PHPUnit\Framework\TestCase;

use Humanids\Generator;
use Humanids\Tokens\AdjectiveToken;
use Humanids\Tokens\AnimalToken;
use Humanids\Tokens\FixedToken;
use Humanids\Tokens\NumberToken;
use Humanids\Tokens\StringToken;
use Humanids\Tokens\VerbToken;

class DocumentTest extends TestCase {

    public function testNumberToken() {
        $token = new NumberToken(0, 9, 4);
        $value = $token->random();
        $this->assertMatchesRegularExpression('/0{3}[0-9]/', $value);
        $token = new NumberToken(20, 40);
        $value = $token->random();
        $this->assertGreaterThanOrEqual(20, $value);
        $this->assertLessThanOrEqual(40, $value);
    }

    public function testWordToken() {
        $words = ['eat', 'sleep', 'rave', 'repeat'];
        $token = new VerbToken($words);
        $value = $token->random();
        $this->assertContains($value, $words);
    }

    public function testStringToken() {
        $token = new StringToken(8, 'abcdefghijklmnopqrstuvwxyz0123456789');
        $value = $token->random();
        $this->assertMatchesRegularExpression('/[a-z0-9]{8}/', $value);
    }

    public function testAnimalToken() {
        $words = [
            ['fly', 'flies'],
            ['fox', 'foxes'],
            ['frog', 'frogs'],
            ['gecko', 'geckos'],
        ];
        $singular = ['fly', 'fox', 'frog', 'gecko'];
        $plural = ['flies', 'foxes', 'frogs', 'geckos'];
        $token = new AnimalToken(false, $words);
        $value = $token->random();
        $this->assertContains($value, $singular);
        $token = new AnimalToken(true, $words);
        $value = $token->random();
        $this->assertContains($value, $plural);
    }

    public function testGenerator() {
        # Simple, just adjective-animal-number
        $tokens = [
            new AdjectiveToken(),
            new AnimalToken(),
            new NumberToken(1, 100, 3),
        ];
        $generator = new Generator($tokens);
        $value = $generator->generate();
        $this->assertMatchesRegularExpression('/([a-z]+)-([a-z]+)-([0-9]{3})/', $value);
        # A slightly more complex case: ec2-adjective-animal-number-string
        $tokens = [
            new FixedToken('ec2'),
            new AdjectiveToken(),
            new AnimalToken(),
            new NumberToken(1, 999, 3),
            new StringToken(4, 'abcdefghijklmnopqrstuvwxyz'),
        ];
        $generator = new Generator($tokens);
        $value = $generator->generate();
        $this->assertMatchesRegularExpression('/ec2-([a-z]+)-([a-z]+)-([0-9]{3})-([a-z]{4})/', $value);
    }
}
