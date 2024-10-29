# humanids-php

Human-readable identifier generation

The easiest way to generate identifiers that are easy to read, easy to remember and easy to understand if someone gives it to you.

### Basic usage

First require `biohzrdmx/humanids-php` with Composer.

Then you must build a `Generator` instance and to do so you must pass an array of `TokenInterface` implementations, the library includes some common ones to add random adjectives, verbs, animals, numbers, strings, etc.

For example, you can get identifiers in the form `adjective-animal-number[1-100]{3}` with this call:

```php
use Humanids\Generator;
use Humanids\Tokens\AdjectiveToken;
use Humanids\Tokens\AnimalToken;
use Humanids\Tokens\NumberToken;

$tokens = [
    new AdjectiveToken(),
    new AnimalToken(),
    new NumberToken(1, 100, 3),
];
$generator = new Generator($tokens);
$identifier = $generator->generate();
```

Or with this call you'll get identifiers in the form `ec2-adjective-animal-number[1-999]{3}-string{4}`:

```php
use Humanids\Generator;
use Humanids\Tokens\AdjectiveToken;
use Humanids\Tokens\AnimalToken;
use Humanids\Tokens\FixedToken;
use Humanids\Tokens\NumberToken;
use Humanids\Tokens\StringToken;

$tokens = [
    new FixedToken('ec2'),
    new AdjectiveToken(),
    new AnimalToken(),
    new NumberToken(1, 999, 3),
    new StringToken(4, 'abcdefghijklmnopqrstuvwxyz'),
];
$generator = new Generator($tokens);
```

You may also create your own `TokenInterface` implementations, for example by extending the `AbstractWordToken` class or by directly implementing the interface`, check the source for any of the generators to get an idea of how they work.

### Licensing

This software is released under the MIT license.

Copyright © 2024 biohzrdmx

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

### Credits

**Lead coder:** biohzrdmx &lt;[github.com/biohzrdmx](http://github.com/biohzrdmx)&gt;
