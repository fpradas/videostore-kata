<?php

namespace Webflix\Movie\Calculator\Amount;

/**
 * Interface AmountCalculator
 */
interface AmountCalculator
{
    public function calculateAmount(int $daysRented): float;
}
