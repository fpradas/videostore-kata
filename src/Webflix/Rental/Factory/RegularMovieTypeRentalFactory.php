<?php

namespace Webflix\Rental\Factory;

use Webflix\Movie\Calculator\Amount\FixedForNDaysMultiplyByFactorAmountCalculator;
use Webflix\Movie\Calculator\FrequentRenterPoints\FixedFrequentRenterPointsCalculator;

/**
 * Class ChildrenMovieRentalBuilder
 *
 * @property FixedForNDaysMultiplyByFactorAmountCalculator $amountCalculator
 * @property FixedFrequentRenterPointsCalculator $frequentRenterPointsCalculator
 */
class RegularMovieTypeRentalFactory extends MovieTypeRentalFactory
{
    public function __construct(
        FixedForNDaysMultiplyByFactorAmountCalculator $amountCalculator,
        FixedFrequentRenterPointsCalculator $frequentRenterPointsCalculator
    ) {
        parent::__construct($amountCalculator, $frequentRenterPointsCalculator);
    }

    protected function configureFrequentRenterPointsCalculator()
    {
        $this->frequentRenterPointsCalculator->setFixedPoints(1);
    }

    protected function configureAmountCalculator()
    {
        $this->amountCalculator->setFixedAmount(2);
        $this->amountCalculator->setMinDays(2);
        $this->amountCalculator->setMultiplierFactor(1.5);
    }
}
