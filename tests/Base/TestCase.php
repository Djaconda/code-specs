<?php

namespace Tests\Base;

use PHPKitchen\CodeSpecs\Mixin\TesterInitialization;

/**
 * Represents base class for all of the test cases.
 *
 * @mixin TesterInitialization;
 *
 * @author Dmitry Kolodko <prowwid@gmail.com>
 */
class TestCase extends \PHPUnit\Framework\TestCase {
    use TesterInitialization;

    public const FIXTURES_DIR = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Fixtures' . DIRECTORY_SEPARATOR;
}
