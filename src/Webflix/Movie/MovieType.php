<?php

namespace Webflix\Movie;

/**
 * Class MovieType
 */
final class MovieType
{
    const NEW_RELEASE_TYPE = 0;
    const CHILDRENS_TYPE = 1;
    const REGULAR_TYPE = 2;

    /** @var int */
    private $type;

    private function __construct($type)
    {
        $this->setType($type);
    }

    public static function instanceAsNewReleaseType(): self
    {
        return new static(static::NEW_RELEASE_TYPE);
    }

    public static function instanceAsChildrensType(): self
    {
        return new static(static::CHILDRENS_TYPE);
    }

    public static function instanceAsRegularType(): self
    {
        return new static(static::REGULAR_TYPE);
    }

    public function type()
    {
        return $this->type;
    }

    private function setType(int $type)
    {
        $this->type = $type;
    }

    public function isNewReleaseType(): bool
    {
        return $this->type === static::NEW_RELEASE_TYPE;
    }

    public function isChildrensType(): bool
    {
        return $this->type === static::CHILDRENS_TYPE;
    }

    public function isRegularType(): bool
    {
        return $this->type === static::REGULAR_TYPE;
    }

    public function equals(MovieType $movieType): bool
    {
        return $this->type() === $movieType->type();
    }
}
