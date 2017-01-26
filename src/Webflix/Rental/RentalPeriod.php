<?php

namespace Webflix\Rental;

/**
 * Class RentalDuration
 */
class RentalPeriod
{
    /** @var int */
    private $seconds;

    private function __construct(int $seconds)
    {
        $this->seconds = $seconds;
    }

    public static function instanceInDays(int $days): self
    {
        return new static(60 * 60 * 24 * $days);
    }

    public function days(): int
    {
        return floor($this->seconds / (60 * 60 * 24));
    }
}
