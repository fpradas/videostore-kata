<?php

namespace Webflix\Movie\Calculator\FrequentRenterPoints;

/**
 * Class FixedFrequentRenterPointsCalculator
 */
class FixedFrequentRenterPointsCalculator implements FrequentRenterPointsCalculator
{
    /** @var int */
    private $fixedPoints;

    /**
     * @param int $fixedPoints
     */
    public function setFixedPoints(int $fixedPoints)
    {
        $this->fixedPoints = $fixedPoints;
    }

    public function calculatePoints(int $daysRented): int
    {
        return $this->fixedPoints;
    }

}
