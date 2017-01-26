<?php

namespace Webflix\Movie\Calculator\FrequentRenterPoints;

/**
 * Interface FrequentRenterPointsCalculator
 */
interface FrequentRenterPointsCalculator
{
    public function calculatePoints(int $daysRented): int;
}
