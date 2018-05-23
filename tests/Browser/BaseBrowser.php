<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use PHPUnit_Framework_Assert as PHPUnit;

class BaseBrowser extends Browser
{
    /**
     * Assertion for checking the number of elements matches a given count.
     *
     * @param  integer $count
     * @param  object  $elements
     * @return object
     */
    public function assertElementCountIs($count, $elements)
    {
        PHPUnit::assertEquals($count, count($elements));

        return $this;
    }

    /**
     * Assertion for checking the number of elements does not match a given count.
     *
     * @param  integer $count
     * @param  object  $elements
     * @return object
     */
    public function assertElementCountIsNot($count, $elements)
    {
        PHPUnit::assertNotEquals($count, count($elements));

        return $this;
    }
}
