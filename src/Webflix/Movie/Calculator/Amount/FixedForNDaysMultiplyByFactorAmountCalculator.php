<?php

namespace Webflix\Movie\Calculator\Amount;

/**
 * Class FixedForNDaysMultiplyByFactorAmountCalculator
 */
class FixedForNDaysMultiplyByFactorAmountCalculator implements AmountCalculator
{
    /** @var float */
    private $fixedAmount;
    
    /** @var int */
    private $minDays;
    
    /** @var float */
    private $multiplierFactor;

    /**
     * @param float $fixedAmount
     */
    public function setFixedAmount(float $fixedAmount)
    {
        $this->fixedAmount = $fixedAmount;
    }

    /**
     * @param int $minDays
     */
    public function setMinDays(int $minDays)
    {
        $this->minDays = $minDays;
    }

    /**
     * @param float $multiplierFactor
     */
    public function setMultiplierFactor(float $multiplierFactor)
    {
        $this->multiplierFactor = $multiplierFactor;
    }

    public function calculateAmount(int $daysRented): float
    {
        if($daysRented <= $this->minDays) {
            return $this->fixedAmount;
        }

        return $this->fixedAmount + ($daysRented - $this->minDays) * $this->multiplierFactor;
    }

}
