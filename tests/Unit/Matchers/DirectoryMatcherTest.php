<?php

namespace Tests\Unit\Matchers;

use Exception;
use PHPKitchen\CodeSpecs\Expectation\Matcher\DirectoryMatcher;
use Tests\Base\BaseMatcherTest;

/**
 * Unit test for {@link DirectoryMatcher}
 *
 * @method DirectoryMatcher createMatcherWithActualValue($actualValue)
 *
 * @coversDefaultClass \PHPKitchen\CodeSpecs\Expectation\Matcher\DirectoryMatcher
 *
 * @package Tests\Expectation
 * @author Dmitry Kolodko <prowwid@gmail.com>
 */
class DirectoryMatcherTest extends BaseMatcherTest {
    protected function initMatcherClass(): void {
        $this->matcherClass = DirectoryMatcher::class;
    }

    /**
     * @covers ::__construct
     */
    public function testCreate(): void {
        try {
            $this->createMatcherWithActualValue('');
            $matcherCreated = true;
        } catch (Exception $e) {
            $matcherCreated = false;
        }
        $this->assertTrue($matcherCreated, 'Unable to instantiate ' . DirectoryMatcher::class);
    }

    /**
     * @covers ::isExist
     */
    public function testIsExist(): void {
        $directory = $this->createMatcherWithActualValue(__DIR__);
        $directory->isExist();
    }

    /**
     * @covers ::isNotExist
     */
    public function testIsNotExist(): void {
        $directory = $this->createMatcherWithActualValue(__DIR__ . 'notExistingDirectory');
        $directory->isNotExist();
    }

    /**
     * @covers ::isReadable
     */
    public function testIsReadable(): void {
        $directory = $this->createMatcherWithActualValue(__DIR__);
        $directory->isReadable();
    }

    /**
     * @covers ::isNotReadable
     */
    public function testIsNotReadable(): void {
        // @TODO: this is a bad approach. Need to refactor to not depend on the fact that root dir is not accessible(as it actually might be accessible)
        $directory = $this->createMatcherWithActualValue('/root');
        $directory->isNotReadable();
    }

    /**
     * @covers ::isWritable
     */
    public function testIsWritable(): void {
        $directory = $this->createMatcherWithActualValue('/tmp');
        $directory->isWritable();
    }

    /**
     * @covers ::isNotWritable
     */
    public function testIsNotWritable(): void {
        // @TODO: this is a bad approach. Need to refactor to not depend on the fact that root dir is not accessible(as it actually might be accessible)
        $directory = $this->createMatcherWithActualValue('/root');
        $directory->isNotWritable();
    }
}
