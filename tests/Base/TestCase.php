<?php

namespace Tests\DeKey\Tester\Base;

use DeKey\Tester\TesterInitialization;

/**
 * Represents base class for all of the test cases.
 *
 * @author Dmitry Kolodko <prowwid@gmail.com>
 */
class TestCase extends \PHPUnit\Framework\TestCase {
    use TesterInitialization;
    const FIXTURES_DIR = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Fixtures' . DIRECTORY_SEPARATOR;
}