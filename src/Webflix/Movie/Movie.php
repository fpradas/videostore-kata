<?php

namespace Webflix\Movie;

/**
 * Class Movie
 */
class Movie
{
    /** @var string */
    private $title;

    /** @var MovieType */
    private $movieType;

    public function __construct(
        string $title,
        MovieType $movieType
    )
    {
        $this->setTitle($title);
        $this->setMovieType($movieType);
    }

    public function title(): string
    {
        return $this->title;
    }

    private function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function movieType(): MovieType
    {
        return $this->movieType;
    }
    
    private function setMovieType(MovieType $movieType)
    {
        $this->movieType = $movieType;
    }
}
