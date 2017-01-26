<?php

namespace Webflix\Movie\Calculator\Amount;

/**
 * Class MultipleAmountCalculatorStrategy
 */
class MultiplyByFactorAmountCalculator implements AmountCalculator
{
    /** @var float */
    private $multiplierFactor;

    /**
     * @param float $multiplierFactor
     */
    public function setMultiplierFactor(float $multiplierFactor)
    {
        $this->multiplierFactor = $multiplierFactor;
    }

    public function calculateAmount(int $daysRented): float
    {
        return $daysRented * $this->multiplierFactor;
    }


}
