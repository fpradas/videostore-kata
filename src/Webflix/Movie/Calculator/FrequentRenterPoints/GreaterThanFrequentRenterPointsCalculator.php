<?php

namespace Webflix\Movie\Calculator\FrequentRenterPoints;

/**
 * Class GreaterThanFrequentRenterPointsCalculator
 */
class GreaterThanFrequentRenterPointsCalculator implements FrequentRenterPointsCalculator
{
    /** @var int */
    private $greaterThanDays;

    /** @var int */
    private $greaterPoints;

    /** @var int */
    private $lessOrEqualPoints;

    /**
     * @param int $greaterThanDays
     */
    public function setGreaterThanDays(int $greaterThanDays)
    {
        $this->greaterThanDays = $greaterThanDays;
    }

    /**
     * @param int $greaterPoints
     */
    public function setGreaterPoints(int $greaterPoints)
    {
        $this->greaterPoints = $greaterPoints;
    }

    /**
     * @param int $lessOrEqualPoints
     */
    public function setLessOrEqualPoints(int $lessOrEqualPoints)
    {
        $this->lessOrEqualPoints = $lessOrEqualPoints;
    }

    public function calculatePoints(int $daysRented): int
    {
        return ($daysRented > $this->greaterThanDays) ? $this->greaterPoints : $this->lessOrEqualPoints;
    }

}
