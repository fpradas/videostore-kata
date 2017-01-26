<?php

namespace Webflix\Customer;

/**
 * Class Customer
 */
class Customer
{
    /** @var  string */
    private $name;

    /** @var array  */
    private $rentals = [];


    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name() : string
    {
        return $this->name;
    }
}
