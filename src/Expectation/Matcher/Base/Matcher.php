<?php

namespace PHPKitchen\CodeSpecs\Expectation\Matcher\Base;

use PHPKitchen\CodeSpecs\Contract\ExpectationMatcher;
use PHPKitchen\CodeSpecs\Expectation\Internal\Assert;

/**
 * Matcher is a base class for all of the expectation matchers.
 *
 * @package PHPKitchen\CodeSpecs\Base
 * @author Dmitry Kolodko <prowwid@gmail.com>
 */
abstract class Matcher implements ExpectationMatcher {
    public function __construct(private Assert $assert) {
    }

    public function __clone() {
        $this->assert = clone $this->assert;
    }

    protected function startStep($stepName): Assert {
        $this->assert->changeCurrentStepTo($stepName);

        return $this->assert;
    }

    public function __invoke($actualValue): Matcher {
        $newMatcher = clone $this;

        $newMatcher->assert->switchToInTimeExecutionStrategy();
        $newMatcher->assert->runStepsWithActualValue($actualValue);

        return $newMatcher;
    }

    protected function createInternalMatcherWithDescription($matcherClass, $description) {
        $assert = clone $this->assert;
        $assert->changeDescriptionTo($description);

        return new $matcherClass($assert);
    }

    protected function getActualValue() {
        return $this->assert->getActualValue();
    }
}
