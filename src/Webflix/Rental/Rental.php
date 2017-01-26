<?php

namespace Webflix\Rental;

use Webflix\Movie\Movie;

/**
 * Class Rental
 */
class Rental
{
    /** @var Movie */
    private $movie;

    /** @var RentalPeriod */
    private $duration;

    /** @var float */
    private $amount;

    /** @var int */
    private $frequentRenterPoints;

    public function __construct(
        Movie $movie,
        RentalPeriod $duration,
        float $amount,
        int $frequentRenterPoints
    )
    {
        $this->movie = $movie;
        $this->duration = $duration;
        $this->amount = $amount;
        $this->frequentRenterPoints = $frequentRenterPoints;
    }

    public function movie(): Movie
    {
        return $this->movie;
    }

    public function movieTitle()
    {
        return $this->movie->title();
    }

    public function duration(): RentalPeriod
    {
        return $this->duration;
    }

    public function amount()
    {
        return $this->amount;
    }

    public function frequentRenterPoints()
    {
        return $this->frequentRenterPoints;
    }

}
