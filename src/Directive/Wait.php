<?php

namespace PHPKitchen\CodeSpecs\Directive;

use PHPKitchen\CodeSpecs\Expectation\Internal\StepsList;

/**
 * Represents a helper that allows to wait with a specified convention.
 *
 * @package PHPKitchen\CodeSpecs\Expectation
 * @author Dmitry Kolodko <prowwid@gmail.com>
 */
class Wait {
    private int $microSecondMultiplier = 1;
    private int $milliSecondMultiplier = 100000;
    private int $secondMultiplier = 1000000;
    private int $minuteMultiplier = 60000000;

    public function __construct(private int $timeToWait, private StepsList $steps) {
    }

    public function microseconds(): void {
        $this->wait('seconds', $this->microSecondMultiplier);
    }

    public function milliseconds(): void {
        $this->wait('seconds', $this->milliSecondMultiplier);
    }

    public function seconds(): void {
        $this->wait('seconds', $this->secondMultiplier);
    }

    public function minutes(): void {
        $this->wait('minutes', $this->minuteMultiplier);
    }

    protected function wait($unitOfTime, $multiplier): void {
        $this->steps->add("I wait $this->timeToWait $unitOfTime");

        usleep($this->timeToWait * $multiplier);
    }
}
