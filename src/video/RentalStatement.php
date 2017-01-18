<?php

namespace video;

/**
 * Class RentalStatement
 */
class RentalStatement
{
    /** @var  string */
    private $name;

    /** @var  array */
    private $rentals;

    /**
     * RentalStatement constructor.
     * @param $customerName
     */
    public function __construct($customerName)
    {
        $this->name = $customerName;
    }

    /**
     * @param Rental $rental
     */
    public function addRental($rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function makeRentalStatement()
    {
        return $this->makeHeader()
            . $this->makeRentalLines()
            . $this->makeSummary();
    }

    /**
     * @return string
     */
    private function makeHeader() : string
    {
        return "Rental Record for " . $this->name() . "\n";
    }

    /**
     * @return string
     */
    private function makeRentalLines() : string
    {
        $rentalLines = "";

        foreach($this->rentals as $rental) {
            $rentalLines .= $this->makeRentalLine($rental);
        }

        return $rentalLines;
    }

    private function determineFrequentRenterPoints()
    {
        return array_reduce($this->rentals, function(int $carry, Rental $rental) {
            return $carry + $rental->determineFrequentRenterPoints();
        }, 0);
    }

    private function determineTotalAmount()
    {
        return array_reduce($this->rentals, function(int $carry, Rental $rental) {
            return $carry + $rental->determineAmount();
        }, 0);
    }

    /**
     * @param Rental $rental
     * @return string
     */
    private function makeRentalLine(
        $rental
    ) : string
    {
        /** @var float $thisAmount */
        $thisAmount = $rental->determineAmount();

        return $this->formatRentalLine($rental, $thisAmount);
    }

    /**
     * @param Rental $rental
     * @param float $thisAmount
     * @return string
     */
    private function formatRentalLine($rental, $thisAmount) : string
    {
        return "\t" . $rental->title() . "\t" . number_format($thisAmount, 1) . "\n";
    }

    /**
     * @return string
     */
    private function makeSummary() : string
    {
        $totalAmount = $this->determineTotalAmount();
        $frequentRenterPoints = $this->determineFrequentRenterPoints();

        return "You owed " . $totalAmount . "\n" . "You earned " . $frequentRenterPoints . " frequent renter points\n";
    }

    /**
     * Name accessor.
     * @return string
     */
    public function name() : string
    {
        return $this->name;
    }

    /**
     * Amount owed accessor.
     * @return float
     */
    public function amountOwed() : float
    {
        return $this->determineTotalAmount();
    }

    /**
     * Frequent renter points accessor.
     * @return int
     */
    public function frequentRenterPoints() : int
    {
        return $this->determineFrequentRenterPoints();
    }
}
