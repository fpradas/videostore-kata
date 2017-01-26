<?php

namespace Webflix\Rental\Factory;

use Webflix\Movie\Movie;
use Webflix\Movie\MovieType;
use Webflix\Rental\Rental;

/**
 * Class RentalFactory
 */
class RentalFactory
{
    /** @var NewReleaseMovieTypeRentalFactory */
    private $newReleaseMovieTypeRentalFactory;

    /** @var ChildrensMovieTypeRentalFactory */
    private $childrensMovieTypeRentalFactory;

    /** @var RegularMovieTypeRentalFactory */
    private $regularMovieTypeRentalFactory;

    public function __construct(
        NewReleaseMovieTypeRentalFactory $newReleaseMovieTypeRentalBuilder,
        ChildrensMovieTypeRentalFactory $childrensMovieTypeRentalBuilder,
        RegularMovieTypeRentalFactory $regularMovieTypeRentalBuilder
    ) {
        $this->newReleaseMovieTypeRentalFactory = $newReleaseMovieTypeRentalBuilder;
        $this->childrensMovieTypeRentalFactory = $childrensMovieTypeRentalBuilder;
        $this->regularMovieTypeRentalFactory = $regularMovieTypeRentalBuilder;
    }

    private function determineFactoryByMovie(Movie $movie): MovieTypeRentalFactory
    {
        switch ($movie->movieType()->type()) {
            case MovieType::CHILDRENS_TYPE:
                return $this->childrensMovieTypeRentalFactory;
                break;
            case MovieType::NEW_RELEASE_TYPE:
                return $this->newReleaseMovieTypeRentalFactory;
                break;
            case MovieType::REGULAR_TYPE:
                return $this->regularMovieTypeRentalFactory;
                break;
            default:
                throw new \InvalidArgumentException();
        }
    }

    public function instance(
        Movie $movie,
        int $rentalDays
    ): Rental
    {
        $builder = $this->determineFactoryByMovie($movie);

        return $builder->instance($movie, $rentalDays);
    }
}
