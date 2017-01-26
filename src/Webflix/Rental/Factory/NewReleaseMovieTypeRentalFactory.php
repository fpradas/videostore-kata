<?php

namespace Webflix\Rental\Factory;

use Webflix\Movie\Calculator\Amount\MultiplyByFactorAmountCalculator;
use Webflix\Movie\Calculator\FrequentRenterPoints\GreaterThanFrequentRenterPointsCalculator;

/**
 * Class ChildrenMovieRentalBuilder
 *
 * @property MultiplyByFactorAmountCalculator $amountCalculator
 * @property GreaterThanFrequentRenterPointsCalculator$frequentRenterPointsCalculator
 */
class NewReleaseMovieTypeRentalFactory extends MovieTypeRentalFactory
{
    public function __construct(
        MultiplyByFactorAmountCalculator $amountCalculator,
        GreaterThanFrequentRenterPointsCalculator $frequentRenterPointsCalculator
    ) {
        parent::__construct($amountCalculator, $frequentRenterPointsCalculator);
    }

    protected function configureFrequentRenterPointsCalculator()
    {
        $this->frequentRenterPointsCalculator->setGreaterPoints(2);
        $this->frequentRenterPointsCalculator->setGreaterThanDays(1);
        $this->frequentRenterPointsCalculator->setLessOrEqualPoints(1);
    }

    protected function configureAmountCalculator()
    {
        $this->amountCalculator->setMultiplierFactor(3.0);
    }
}
