<?php

namespace Webflix\Rental\Factory;

use Webflix\Movie\Calculator\Amount\AmountCalculator;
use Webflix\Movie\Calculator\FrequentRenterPoints\FrequentRenterPointsCalculator;
use Webflix\Movie\Movie;
use Webflix\Rental\Rental;
use Webflix\Rental\RentalPeriod;

/**
 * Class RentalFactory
 */
abstract class MovieTypeRentalFactory
{
    /** @var AmountCalculator */
    protected $amountCalculator;

    /** @var FrequentRenterPointsCalculator */
    protected $frequentRenterPointsCalculator;

    public function __construct(
        AmountCalculator $amountCalculator,
        FrequentRenterPointsCalculator $frequentRenterPointsCalculator
    ) {
        $this->amountCalculator = $amountCalculator;
        $this->frequentRenterPointsCalculator = $frequentRenterPointsCalculator;
    }

    abstract protected function configureAmountCalculator();
    abstract protected function configureFrequentRenterPointsCalculator();

    public function instance(Movie $movie, int $rentalDays): Rental
    {
        $this->configureAmountCalculator();
        $this->configureFrequentRenterPointsCalculator();

        $amount = $this->amountCalculator->calculateAmount($rentalDays);
        $frequentRenterPoints = $this->frequentRenterPointsCalculator->calculatePoints($rentalDays);

        return new Rental(
            $movie,
            RentalPeriod::instanceInDays($rentalDays),
            $amount,
            $frequentRenterPoints
        );
    }
}
